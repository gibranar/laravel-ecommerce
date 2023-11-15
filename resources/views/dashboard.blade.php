@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Dashboard</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Modules</a></div>
            <div class="breadcrumb-item">Chart.js</div>
        </div>
    </div>

    <div class="section-body">
        <h2 class="section-title">Chart.js</h2>
        <p class="section-lead">
            We use 'Chart.JS' made by @chartjs. You can check the full documentation <a href="http://www.chartjs.org/">here</a>.
        </p>
        <div class="row">
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Top 5 Items Quantity</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="doughnutChart" style="display: block; height: 274px; width: 548px;" class="chartjs-render-monitor" width="685" height="342"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Top 5 Items Margin</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="pieChart" style="display: block; height: 274px; width: 548px;" class="chartjs-render-monitor" width="685" height="342"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('libJS')
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
@endsection

@section('js')
<script src="{{ asset('/stisla/js/page/modules-chartjs.js') }}"></script>
@endsection