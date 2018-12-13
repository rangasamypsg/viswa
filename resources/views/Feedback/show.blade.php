@extends('layouts.app')

@section('content')
<div class="widget">
	<header class="widget-header">
		<div class="col-md-6">
			<h4 class="widget-title">Experience Feedback</h4>
		</div>
		<div class="col-md-6">
			<a href="{{ route('Feedback.index') }}">
				<button type="submit" class="btn btn-info btn-sm pull-right">
					<i class="fa fa-mail-reply"></i>&nbsp;&nbsp;Back
				</button>
			</a>
		</div>
	</header><!-- .widget-header -->
	<hr class="widget-separator">
	<div class="widget-body">

	@if($feedbacks->count() < 1)
		<ul class="list-group">
			<li class="list-group-item text-center"><strong>No Records Found</strong></li>
		<ul>
	@endif
	<?php $i = 1; ?>
  	@foreach($feedbacks as $key => $feedback)
	<button class="accordion">Experience Feedback {{ $i }}</button>
	<div class="panel">
		<?php  $options = Helper::getQuestions( $feedback->answer_id ); ?>
		<ul class="list-group">
		 @foreach($options as $key => $option) 
				<li class="list-group-item">{{ Helper::getQuestion( $option->question_id ) }}</li>
				<li class="list-group-item"><strong>Answer : {{ $option->answer }} </strong></li>
		 @endforeach		
		</ul>
	</div>	
	<?php $i++; ?>
	@endforeach
	</div><!-- .widget-body -->
	<div class="text-center">
		{{ $feedbacks->links() }}
	</div>
</div><!-- .widget -->

<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var panel = this.nextElementSibling;
        if (panel.style.display === "block") {
            panel.style.display = "none";
        } else {
            panel.style.display = "block";
        }
    });
}
</script>

<style>
.accordion {
    background-color: #eee;
    color: #444;
    cursor: pointer;
    padding: 18px;
    width: 100%;
    border: none;
    text-align: left;
    outline: none;
    font-size: 15px;
    transition: 0.4s;
	border : 1px solid #382E2D;
	border-radius : 5px;
}

.active, .accordion:hover {
	background-color: #382E2D;
    color: white;
    font-weight: 700;
}

.panel {
    padding: 0 18px;
    display: none;
    background-color: white;
    overflow: hidden;
}
</style>

@endsection