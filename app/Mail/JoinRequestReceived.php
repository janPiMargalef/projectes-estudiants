<?php

namespace App\Mail;

use App\Models\Student;
use App\Models\Project;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class JoinRequestReceived extends Mailable
{
    use Queueable, SerializesModels;

    public $project;
    public $requester;

    public function __construct($project, Student $requester)
    {
        $this->project = $project;
        $this->requester = $requester;
    }

    public function build()
    {
        return $this->view('emails.joinRequestReceived')
                    ->with([
                        'projectName' => $this->project->title,
                        'projectId' => $this->project->id,
                        'studentId' => $this->requester->id, // asumimos que es el ID del estudiante
                        'requesterEmail' => $this->requester->user->email // suponiendo que student tiene una relación user()
                    ]);
    }
}
