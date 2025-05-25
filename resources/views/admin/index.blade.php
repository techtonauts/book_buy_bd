@extends('admin.layouts.dashboard')

@section('x-data')
    { page: 'ecommerce', loaded: true, darkMode: false, stickyMenu: false, sidebarToggle: false, scrollTop: false }
@endsection


@section('content')
    <div class="p-4 mx-auto max-w-(--breakpoint-2xl) md:p-6">
        <div class="grid grid-cols-12 gap-4 md:gap-6">
            <div class="col-span-12 space-y-6 xl:col-span-7">
                <!-- Metric Group One -->
                @include('admin.components.matric-group')
                <!-- Metric Group One -->

                <!-- ====== Chart One Start -->
                @include('admin.components.chart1')
                <!-- ====== Chart One End -->
            </div>
            <div class="col-span-12 xl:col-span-5">
                <!-- ====== Chart Two Start -->
                <@include('admin.components.chart2') <!--======Chart Two End -->
            </div>

            <div class="col-span-12">
                <!-- ====== Chart Three Start -->
                @include('admin.components.chart3')
                <!-- ====== Chart Three End -->
            </div>

            <div class="col-span-12 xl:col-span-5">
                <!-- ====== Map One Start -->
                <include src="./partials/map-01.html" />
                <!-- ====== Map One End -->
            </div>

            <div class="col-span-12 xl:col-span-7">
                <!-- ====== Table One Start -->
                <include src="./partials/table/table-01.html" />
                <!-- ====== Table One End -->
            </div>
        </div>
    </div>
@endsection
