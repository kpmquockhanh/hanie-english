<?php

namespace App\Console\Commands;

use App\Teacher;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class OptimizeTeacherCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'optimize:teacher';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Optimize teacher img';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $teachers = Teacher::all();
        foreach ($teachers as $teacher) {
            try {
                $image = Storage::disk('s3')->get($teacher->image);
                $resizedImg = Image::make($image);
                if ($resizedImg->width() !== 300 && $resizedImg->height() !== 300) {
                    echo "Resize $teacher->image\n";
                    if ($resizedImg->width() < $resizedImg->height()) {
                        $resizedImg->crop($resizedImg->width(), $resizedImg->width());
                    } else {
                        $resizedImg->crop($resizedImg->height(), $resizedImg->height());
                    }
                    $resizedImg->resize(300, 300)->encode();
                    Storage::disk('s3')->put($teacher->image, $resizedImg, 'public');
                }
            } catch(\Exception $e) {
                echo $e->getMessage();
            }
        }
    }
}
