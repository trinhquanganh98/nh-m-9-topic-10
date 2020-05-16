@extends('admin.layout')
@section('body')

<!-- 
<div class="I-layout">
	<div class="layout_wrapper_01">
		<div class="I-data">
			<div class="data_item_wrapper">
				<div class="data_item bg_success text_light" style="background: linear-gradient(230deg, #759bff, #843cf6);">
					<div class="data_wrapper">
						<div class="title">
							Đơn Thành Công
						</div>
						<div class="data">
							3000
						</div>
					</div>
				</div>
			</div>
			<div class="data_item_wrapper">
				<div class="data_item bg_danger text_light" style="background: linear-gradient(316deg, #fc5286, #fbaaa2)">
					<div class="data_wrapper">
						<div class="title">
							Đơn Bị Hủy
						</div>
						<div class="data">
							3000
						</div>
					</div>
				</div>
			</div>
			<div class="data_item_wrapper">
				<div class="data_item text_light" style="background: linear-gradient(135deg, #ffc480, #ff763b);">
					<div class="data_wrapper">
						<div class="title">
							Doanh Thu
						</div>
						<div class="data">
							3000
						</div>
					</div>
				</div>
			</div>
			<div class="data_item_wrapper">
				<div class="data_item text_light" style="background: linear-gradient(to bottom, #0e4cfd, #6a8eff);">
					<div class="data_wrapper">
						<div class="title">
							Sản Phẩm Bán Được
						</div>
						<div class="data">
							3000
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="I-layout">
	<div class="layout_wrapper_01">
		<div class="I-table">
			<div class="table_wrapper">
				<div class="title_table">
					<div class="title_name">
						Nhập Xuất Tháng Này
					</div>
				</div>
				<div class="content_table">
            		<canvas id="chart-0" style="display: block; width: 800px; height: 400px;" width="800" height="400" class="chartjs-render-monitor"></canvas>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	
    var presets = window.chartColors;
    var utils = Samples.utils;
    var inputs = {
        min: 20,
        max: 80,
        count: 10,
        decimals: 2,
        continuity: 1
    };

    function generateData() {
        return utils.numbers(inputs);
    }

    function generateLabels() {
    	var date = []
    	for (var i = 1; i <= 31; i++) {
    		date[i] = i
    	}
    	// console.log(date)
    	return date
        // return utils.months({ count: inputs.count });
    }

    utils.srand(42);

    var data = {
        labels: generateLabels(),
        datasets: [{
            backgroundColor: utils.transparentize(presets.red),
            borderColor: presets.red,
            data: 
                <?php
                	echo "[";
                		foreach ($data as $key => $value) {
                    		echo $value . ',';
                		}
                	echo "]";
                ?>,
            label: 'Nhập Vào'
        }]
    };

    var options = {
        maintainAspectRatio: false,
        spanGaps: false,
        elements: {
            line: {
                tension: 0.4
            }
        },
        scales: {
            yAxes: [{
                stacked: true,
	            ticks: {
	            	min: 1,
	            }
            }],
            xAxes: [{
                stacked: true,
	            ticks: {
         		 	beginAtZero: false,
	            	min: 1,
	            }
            }]
        },
        plugins: {
            filler: {
                propagate: false
            },
            'samples-filler-analyser': {
                target: 'chart-analyser'
            }
        }
    };

    var chart = new Chart('chart-0', {
        type: 'line',
        data: data,
        options: options
    });

</script>
				 -->
@endsection()