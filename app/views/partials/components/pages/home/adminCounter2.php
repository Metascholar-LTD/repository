<?php
$items = [
    [
        'category'=>'RD',
        'title'=>'Research Document',
        'value'=>adminCount('research_document', $queryFaculty),
    ],
    [
        'category'=>'RA',
        'title'=>'Research Article',
        'value'=>adminCount('research_article',$queryFaculty),
    ],
    [
        'category'=>'DS',
        'title'=>'Report Dataset',
        'value'=>adminCount('reports_dataset',$queryFaculty),
    ],
    [
        'category'=>'LN',
        'title'=>'Lecture Notes',
        'value'=>adminCount('lecture_notes',$queryFaculty),
    ],
    [
        'category'=>'EB',
        'title'=>'e.Books',
        'value'=>adminCount('ebooks',$queryFaculty),
    ],
    [
        'category'=>'PQ',
        'title'=>'Past questions',
        'value'=>adminCount('past_questions',$queryFaculty),
    ], 
    [
        'category'=>'CF',
        'title'=>'conference',
        'value'=>adminCount('conferences'),
    ], 
    [
        'category'=>'SP',
        'title'=>'Speech',
        'value'=>adminCount('speech'),
    ],
    [
        'category'=>'AC',
        'title'=>'Academic Calendar',
        'value'=>adminCount('academic_calendar',$queryFaculty),
    ],   
];
$sumRecs = 0; 
foreach($items as $i){$sumRecs = $sumRecs + $i['value'];}
?>
<div class="card mt-3 shadow-lg">
<div class="cursor-point">
    <div class="p-3 o-0 " style="width:100%;">
        <div class="">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="text-md text-400">Total Repository Records</div>
                    <h1 class="bold text-black"><?= '~'.$sumRecs.' Documents'?></h1>
                </div>
                <div class="col-md-7 col-12 bg-white">
                    <div id="chartdiv"></div>
                </div>
                <div class="col-md-5 col-12 mb-4">
                    <table class="table table-bordered table-hover">
                        <?php foreach($items as $item){ ?>
                        <tr>
                            <th class="text-black"><?=$item['category'].' = '.$item['title'].':' ?></th>
                            <td class="text-black"><?=$item['value'].' <small class="text-muted">recs</small>'?></td>
                        </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>






<!-- Styles -->
<style>
#chartdiv {
  width: 100%;
  height: 250px;
  padding: 20px 0px 0px;
}
</style>

<!-- Resources -->
<?php amCharts(); ?>

<!-- Chart code -->
<script>
$dataset = <?= json_encode($items)?>

am5.ready(function() {

// Create root element
// https://www.amcharts.com/docs/v5/getting-started/#Root_element
var root = am5.Root.new("chartdiv");

// Set themes
// https://www.amcharts.com/docs/v5/concepts/themes/
root.setThemes([
  am5themes_Animated.new(root)
]);

// Create chart
// https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/
// start and end angle must be set both for chart and series
var chart = root.container.children.push(am5percent.PieChart.new(root, {
  startAngle: 180,
  endAngle: 360,
  layout: root.verticalLayout,
  innerRadius: am5.percent(60)
}));

// Create series
// https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Series
// start and end angle must be set both for chart and series
var series = chart.series.push(am5percent.PieSeries.new(root, {
  startAngle: 180,
  endAngle: 360,
  valueField: "value",
  categoryField: "category",
  alignLabels: false,
  labels: false
}));

series.states.create("hidden", {
  startAngle: 180,
  endAngle: 180
});

series.slices.template.setAll({
  cornerRadius: 30
});

series.ticks.template.setAll({
  forceHidden: false
});

// Set data
// https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Setting_data
series.data.setAll($dataset);

series.appear(1000, 100);

});
</script>
