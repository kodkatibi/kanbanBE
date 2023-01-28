<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class StatusSeeder extends Seeder
{
    public function run()
    {
        $dataStatuses = [
            'To Do',
            'In Progress',
            'Review',
            'Done',
        ];
        $order = 0;
        foreach ($dataStatuses as $dataStatus) {
            $data = [
                'title' => $dataStatus,
                'slug' => Str::slug($dataStatus),
                'order' => $order++
            ];
            Status::create($data);
        }
    }
}
