<h1>{{ $job->title }}</h1>
<p>Congratulation your job is now live on our website.</p>
<p>
    <a href="{{ url('/jobs/'.$job->id) }}">Click to view your job</a>
</p>
