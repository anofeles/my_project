@extends('thems.layout.index')
@section('section')

    <div id="page-content-wrapper" class="page-content-toggle">
        <div class="container-fluid">
            <div class="row">
                <div id="content" class="col-md-8 col-md-offset-1 col-xs-12">


                    <?php




                    foreach ($xdgr as $i => $xdgritem){
                        $dataPoints1[$i] = $xdgr[$i];
                        $dataPoints[$i] = $ydgr[$i];
                    }
//                    dump($dataPoints1);
                    ?>
<div id="chart"></div>
                    <script>

                        var options = {
                            chart: {
                                height: 350,
                                type: 'line',
                                zoom: {
                                    enabled: false
                                }
                            },
                            series: [{
                                data: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK) ?>
                            }],
                            title: {
                                text: '',
                                align: 'center'
                            },
                            xaxis: {
                                categories: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK) ?>,
                            }
                        }

                        var chart = new ApexCharts(
                            document.querySelector("#chart"),
                            options
                        );

                        chart.render();

                    </script>

                </div> <!-- /content-->
            </div> <!-- /row -->
        </div> <!-- /container-fluid -->
    </div>

@endsection
