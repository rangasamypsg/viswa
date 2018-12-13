@extends('layouts.app')

@section('content')
<div class="widget">
	<header class="widget-header">
		<div class="col-md-6">
			<h4 class="widget-title">Customer Feedback List</h4>
		</div>
		<div class="col-md-6">
			<a href="{{ route('StaffQuestion.index') }}">
				<button type="submit" class="btn btn-info btn-sm pull-right">
					<i class="fa fa-mail-reply"></i>&nbsp;&nbsp;Back
				</button>
			</a>
		</div>
	</header><!-- .widget-header -->
	<hr class="widget-separator">
	<div class="widget-body">
	<?php  $i = 1; ?>
	<button class="accordion">Customer Feedback Question {{ $staff_questions->id }}</button>
	<div class="panel">
		<ul class="list-group">
			<li class="list-group-item"><strong>Question :</strong> {{ $staff_questions->text }}</li>
			<?php  $options = Helper::getStaffoptions( $staff_questions->id ); ?>
			<ul class="list-group">
				@foreach($options as $key => $option) 
						<li class="list-group-item"><strong>Option :</strong> {{ $option->option }} </li>
				@endforeach		
			</ul>
		</ul>
	</div>	
	<?php $i++; ?>
	 
	</div><!-- .widget-body -->
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