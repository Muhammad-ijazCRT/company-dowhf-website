<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contacted Us Mail</title>
</head>
<body>
<div class="col-lg-3 col-sm-6 mb-4">
    <div class="card hover-shadow-lg">
        <div class="card-header border-0 pb-0 pt-2 px-3">
            <span class="badge bg-primary p-2 px-3 rounded">
                Contact US
            </span>
        </div>
        <div class="card-body text-center client-box">
            <h5 class="h6 mt-4 mb-0">{{ $details['client_name'] }}</h5>
            <a href="mailto:{{ $details['email'] }}" class="text-sm text-muted mb-3">{{ $details['email'] }}</a>
            <p class="card-text mt-2"><strong>Message:</strong> {{ $details['message'] }}</p>
            <p class="card-text"><strong>Budget:</strong> {{ $details['budget'] }}</p>
            <p class="card-text"><strong>NDA Agreement:</strong> {{ $details['nda_agreement'] }}</p>
            <p class="card-text"><strong>Document:</strong> {{ $details['document'] }}</p>
            <p class="card-text"><strong>Purpose:</strong></p>
            @foreach (json_decode($details['purpose']) as $purpose)
                <span class="badge bg-primary">{{ $purpose }}</span>
            @endforeach
            <p class="card-text mt-2"><strong>Services:</strong></p>
            @foreach (json_decode($details['services']) as $service)
                <span class="badge bg-success">{{ $service }}</span>
            @endforeach
        </div>
    </div>
</div>
    
</body>
</html>
