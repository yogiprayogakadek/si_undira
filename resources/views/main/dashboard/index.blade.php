@extends('template.master')

@section('page-title', 'Dashboard')
@section('page-sub-title', 'Data')

@section('content')
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <div id="main" style="width: 800px;height:700px;"></div>
        </div>
        <div class="col-3"></div>
    </div>
@endsection

@push('script')
    <script src="https://cdn.jsdelivr.net/npm/echarts@5.4.2/dist/echarts.min.js"></script>
    <script>
        function renderChart(kategori, jumlah) {
            $.get("/chart", function(data) {
                var arrayData = [];

                $.each(data, function(index, v) {
                    arrayData.push({
                        value: parseInt(v.value),
                        name: v.label == 1 ? 'Aktif' : 'Tidak aktif'
                    })
                });

                // Initialize the echarts instance based on the prepared dom
                var myChart = echarts.init(document.getElementById('main'));

                // Specify the configuration items and data for the chart
                var option = {
                    title: {
                        text: 'Chart Data',
                        // subtext: 'Berdasarkan kategori',
                        left: 'center'
                    },
                    tooltip: {
                        trigger: 'item'
                    },
                    legend: {
                        orient: 'vertical',
                        left: 'left'
                    },
                    series: [{
                        name: 'Chart',
                        type: 'pie',
                        radius: '50%',
                        data: arrayData,
                        emphasis: {
                            itemStyle: {
                                shadowBlur: 10,
                                shadowOffsetX: 0,
                                shadowColor: 'rgba(0, 0, 0, 0.5)'
                            }
                        }
                    }]
                };
                // Display the chart using the configuration items and data just specified.
                myChart.setOption(option);
            });
        }

        renderChart()
    </script>
@endpush
