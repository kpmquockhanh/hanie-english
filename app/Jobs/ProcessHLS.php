<?php

namespace App\Jobs;

use App\Video;
use Aws\ElasticTranscoder\ElasticTranscoderClient;
use Aws\Exception\AwsException;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class ProcessHLS implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $video;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Video $video)
    {
        $this->video = $video;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $config = config('elastic_trancoder');

        $file = $this->video->disk.'/'.$this->video->path;
        $folder = time();
        $transcoder_client = new ElasticTranscoderClient([
            'version' => '2012-09-25',
            'region' => $config['region'],
            'credentials' => [
                'key' => config('filesystems.disks.s3.key'),
                'secret' => config('filesystems.disks.s3.secret')
            ]
        ]);

        try {
            $job = $transcoder_client->createJob([
                'PipelineId' => $config['pipeline'],

                'Input' => array(
                    'Key' => $file,
                    'FrameRate' => 'auto',
                    'Resolution' => 'auto',
                    'AspectRatio' => 'auto',
                    'Interlaced' => 'auto',
                    'Container' => 'auto',
                ),

                'Outputs' => array(
                    array(
                        'Key' => "hls/$folder/$folder",
                        'Rotate' => 'auto',
                        'PresetId' => $config['preset'],
                        'SegmentDuration' => $config['segment'],
                    ),
                ),
            ]);

            $this->video->update([
                'converted_for_stream_at' => "hls/$folder/$folder.m3u8"
            ]);
            $jobData = $job->get('Job');
            echo $jobData['Status'].'\n';
        } catch (AwsException $e) {
            // output error message if fails
            echo($e->getMessage());
        }
    }
}
