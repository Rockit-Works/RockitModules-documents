<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600&display=swap" rel="stylesheet">

<style type="text/css">

	* {
		font-family: 'nunito';
	}
	p {
		margin-bottom: 0;
	}
	table {
		width: 100%;
	}
	table th {
		text-align: left;
	}
	table.products-table th {
		text-align: right;
	}
	table.products-table th:first-child {
		text-align: left;
	}
	table.products-table td {
		text-align: right;
	}
	table.products-table td:first-child {
		text-align: left;
	}
</style>

<section>
	{{-- Sender --}}
	<div style="display: inline-block; width: 49.5%">
		@include('rockitworks-invoice::components.sender')
	</div>

	{{-- Receiver --}}
	<div style="display: inline-block; width: 49.5%">
		@include('rockitworks-invoice::components.receiver')
	</div>
</section>

<br>

{{-- INFO --}}
<section>
	<h1>Factuur</h1>
	<div style="width: 33%">
		@include('rockitworks-invoice::components.info')
	</div>
</section>

<br><hr><br>

{{-- PRODUCTEN --}}
<section>
	@include('rockitworks-invoice::components.products')
</section>

<br><hr><br>

{{-- TOTALS --}}
<section>
	@include('rockitworks-invoice::components.totals')
</section>

<br><br>

{{-- BOTTOM TEXT --}}
<section>
	@include('rockitworks-invoice::components.bottomText')
</section>
