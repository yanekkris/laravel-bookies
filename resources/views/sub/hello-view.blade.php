<h1>Hello <?php echo $whatever; ?></h1>
<h1>Hello {{ $whatever }}</h1>

<p><?php echo htmlspecialchars($comment); ?></p>

<p>{{ $comment }}</p>

<!-- This is HTML comment - this one will be visible in the source code of HTML page -->

{{-- This is BLADE comment - this one will not be visible anywhere in browser --}}

<p>{{ $description }}</p>
<p>{!! $description !!}</p>

<p>Your age is <?php echo $age; ?></p>


<?php if($age >= 18): ?>
<p>Ok, you are old enough!</p>
<?php else: ?>
<p>Go home, you are too young.</p>
<?php endif; ?>

@if($age >= 18)
    <p>Ok, you are old enough!</p>
@else
    <p>Go home, you are too young.</p>
@endif


@foreach($fruits as $fruit)
    <p>{{ $fruit }}</p>
@endforeach
