<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper" style="margin-bottom: 22px;">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <img src="<?php echo base_url();?>assets/image/LOGO_mini.png" alt="" style="width: 122px;margin-left: -43px;">
                    </div>
                    <div>
                       Statistique
                    </div>
                </div>
            </div>
            <!-- prepare a DOM container with width and height -->
            <div class="row">
                <div class="col-md-6" id="genre" style="height:400px;background-color: white;"></div>
                <!-- END CHART-->
                <script type="text/javascript">
                    // based on prepared DOM, initialize echarts instance
                    var myChart = echarts.init(document.getElementById('genre'));

                    // specify chart configuration item and data
                    option = {
                        title: {
                            text: 'Commande par genre',
                            subtext: 'Homme/Femme',
                            left: 'center'
                        },
                        tooltip: {
                            trigger: 'item',
                            formatter: '{a} <br/>{b} : {c} ({d}%)'
                        },
                        legend: {
                            orient: 'vertical',
                            left: 'left',
                            data: ['Homme', 'Femme']
                        },
                        series: [
                            {
                                name: 'Commande',
                                type: 'pie',
                                radius: '65%',
                                center: ['50%', '60%'],
                                data: [
                                    {value: <?php echo $commandeGenreH->sexe;?>, name: 'Homme'},
                                    {value: <?php echo $commandeGenreF->sexe;?>, name: 'Femme'}
                                ],
                                emphasis: {
                                    itemStyle: {
                                        shadowBlur: 10,
                                        shadowOffsetX: 0,
                                        shadowColor: 'rgba(0, 0, 0, 0.5)'
                                    }
                                }
                            }
                        ]
                    };

                    // use configuration item and data specified to show chart
                    myChart.setOption(option);
                </script>
                <div class="col-md-6" id="prod" style="height:400px;background-color: white;"></div>
                <!-- END CHART-->
                <script type="text/javascript">
                    // based on prepared DOM, initialize echarts instance
                    var myChart = echarts.init(document.getElementById('prod'));

                    // specify chart configuration item and data
                    option = {
                        title: {
                            text: 'Stock',
                            subtext: "l'état de votre stock",
                            left: 'center'
                        },
                        tooltip: {
                            trigger: 'item',
                            formatter: '{a} <br/>{b} : {c} ({d}%)'
                        },
                        legend: {
                            orient: 'vertical',
                            left: 'left',
                            data: ['Homme', 'Femme', 'Enfant', 'Autre']
                        },
                        series: [
                            {
                                name: 'Stock par catégorie',
                                type: 'pie',
                                radius: '65%',
                                center: ['50%', '60%'],
                                data: [
                                    {value: <?php echo $stockHomme->prod;?>, name: 'Homme'},
                                    {value: <?php echo $stockFemme->prod;?>, name: 'Femme'},
                                    {value: <?php echo $stockEnfant->prod;?>, name: 'Enfant'},
                                    {value: <?php echo $stockAutre->prod;?>, name: 'Autre'}
                                ],
                                emphasis: {
                                    itemStyle: {
                                        shadowBlur: 10,
                                        shadowOffsetX: 0,
                                        shadowColor: 'rgba(0, 0, 0, 0.5)'
                                    }
                                }
                            }
                        ]
                    };

                    // use configuration item and data specified to show chart
                    myChart.setOption(option);
                </script>
            </div>

    </div>