<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Kiểm tra cột skills cũ có tồn tại
        if (! Schema::hasColumn('candidates', 'skills')) {
            return;
        }

        // Lấy các candidate đang có skills
        DB::table('candidates')
            ->whereNotNull('skills')
            ->where('skills', '!=', '')
            ->orderBy('id')
            ->chunkById(100, function ($candidates) {

                foreach ($candidates as $candidate) {

                    // "Java,Spring Boot,Docker"
                    // =>
                    // ["Java", "Spring Boot", "Docker"]
                    $skillNames = array_filter(
                        array_map(
                            'trim',
                            explode(',', $candidate->skills)
                        )
                    );

                    foreach ($skillNames as $skillName) {

                        // Tìm skill, nếu chưa có thì tạo
                        $skill = DB::table('skills')
                            ->where('name', $skillName)
                            ->first();

                        if ($skill) {
                            $skillId = $skill->id;
                        } else {
                            $skillId = DB::table('skills')->insertGetId([
                                'name' => $skillName,
                                'description' => null,
                                'created_at' => now(),
                                'updated_at' => now(),
                            ]);
                        }

                        // Gắn skill với candidate
                        DB::table('candidate_skill')
                            ->insertOrIgnore([
                                'candidate_id' => $candidate->id,
                                'skill_id' => $skillId,
                            ]);
                    }
                }
            });

        // Sau khi chuyển dữ liệu thành công thì xóa cột cũ
        Schema::table('candidates', function (Blueprint $table) {
            $table->dropColumn('skills');
        });
    }

    public function down(): void
    {
        // Khôi phục lại cột skills nếu rollback
        Schema::table('candidates', function (Blueprint $table) {
            $table->text('skills')->nullable();
        });
    }
};
