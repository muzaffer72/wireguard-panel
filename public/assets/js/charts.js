(function ($) {
    "use strict";
    const ctxEarnings = $('#billiongroup-earnings-charts'),
        ctxUsers = $('#billiongroup-users-charts'),
        ctxBrowsers = $('#billiongroup-browsers-charts'),
        ctxOs = $('#billiongroup-os-charts'),
        ctxCountries = $('#billiongroup-countries-charts');
    const charts = {
        initEarnings: function () { this.earningsChartsData() },
        initUsers: function () { this.usersChartsData() },
        initLogs: function () { this.logsChartsData() },
        earningsChartsData: function () {
            const dataUrl = BASE_URL + '/dashboard/charts/earnings';
            const request = $.ajax({
                method: 'GET',
                url: dataUrl
            });
            request.done(function (response) {
                charts.createEarningsCharts(response);
            });
        },
        usersChartsData: function () {
            const dataUrl = BASE_URL + '/dashboard/charts/users';
            const request = $.ajax({
                method: 'GET',
                url: dataUrl
            });
            request.done(function (response) {
                charts.createUsersCharts(response);
            });
        },
        logsChartsData: function () {
            if (ctxBrowsers.length || ctxOs.length || ctxCountries.length) {
                const dataUrl = BASE_URL + '/dashboard/charts/logs';
                const request = $.ajax({
                    method: 'GET',
                    url: dataUrl
                });
                request.done(function (response) {
                    charts.createBrowsersCharts(response.browsers);
                    charts.createOsCharts(response.os);
                    charts.createOCountriesCharts(response.countries);
                });
            }
        },
        createEarningsCharts: function (response) {
            const max = response.suggestedMax;
            const labels = response.earningsChartLabels;
            const data = response.earningsChartData;
            const options = {
                colors: [PRIMARY_COLOR, "#FDBA8C"],
                series: [
                    {
                        name: labels,
                        color: PRIMARY_COLOR,
                        data: data,
                    },
                ],
                chart: {
                    type: "bar",
                    height: "320px",
                    fontFamily: "Inter, sans-serif",
                    toolbar: {
                        show: false,
                    },
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: "70%",
                        borderRadiusApplication: "end",
                        borderRadius: 8,
                    },
                },

                states: {
                    hover: {
                        filter: {
                            type: "darken",
                            value: 1,
                        },
                    },
                },
                grid: {
                    show: true,
                    strokeDashArray: 4,
                    padding: {
                        left: 2,
                        right: 2,
                        top: -14
                    },
                },
                dataLabels: {
                    enabled: true,
                },
                legend: {
                    show: false,
                },

                fill: {
                    opacity: 1,
                },
            }

            if (document.getElementById("column-chart") && typeof ApexCharts !== 'undefined') {
                const chart = new ApexCharts(document.getElementById("column-chart"), options);
                chart.render();
            }
            // window.Chart && (new Chart(ctxEarnings, {
            //     type: 'bar',
            //     data: {
            //         labels: labels,
            //         datasets: [{
            //             label: 'Earnings',
            //             data: data,
            //             fill: false,
            //             pointBackgroundColor: "#30b244",
            //             borderColor: "#30b244",
            //             borderWidth: 2,
            //             lineTension: .10,

            //         }]
            //     },
            //     options: {
            //         responsive: true,
            //         maintainAspectRatio: false,
            //         plugins: {
            //             legend: {
            //                 display: false,
            //             },
            //             tooltip: {
            //                 callbacks: {
            //                     label: function (context) {
            //                         let label = context.dataset.label || '';

            //                         if (label) {
            //                             label += ': ';
            //                         }
            //                         if (context.parsed.y !== null) {
            //                             if (CURRENCY_POSITION == 1) {
            //                                 label += CURRENCY_CODE + context.parsed.y;
            //                             } else {
            //                                 label += context.parsed.y + CURRENCY_CODE;
            //                             }
            //                         }
            //                         return label;
            //                     }
            //                 }
            //             }
            //         },
            //         scales: {
            //             y: {
            //                 ticks: {
            //                     beginAtZero: true,
            //                     callback: function (value, index, values) {
            //                         if (CURRENCY_POSITION == 1) {
            //                             return CURRENCY_CODE + ' ' + value;
            //                         } else {
            //                             return value + CURRENCY_CODE;
            //                         }
            //                     }
            //                 },
            //                 gridLines: {
            //                     color: "rgba(204, 204, 204,0.1)"
            //                 },
            //                 suggestedMax: max,
            //             },
            //             x: [{
            //                 gridLines: {
            //                     color: "rgba(204, 204, 204,0.1)"
            //                 }
            //             }]
            //         },
            //     }
            // })).render();
        },
        createUsersCharts: function (response) {
            const max = response.suggestedMax;
            const labels = response.usersChartLabels;
            const data = response.usersChartData;
            let options = {
                chart: {
                    height: "100%",
                    maxWidth: "100%",
                    type: "area",
                    fontFamily: "Inter, sans-serif",
                    dropShadow: {
                        enabled: false,
                    },
                    toolbar: {
                        show: false,
                    },
                },
                tooltip: {
                    enabled: true,
                    x: {
                        show: false,
                    },
                },
                fill: {
                    type: "gradient",
                    gradient: {
                        opacityFrom: 0.55,
                        opacityTo: 0,
                        shade: "#1C64F2",
                        gradientToColors: ["#1C64F2"],
                    },
                },
                dataLabels: {
                    enabled: true,
                },
                markers: {
                    size: 0,
                },
                stroke: {
                    width: 6,
                },
                grid: {
                    show: true,
                    strokeDashArray: 4,
                    padding: {
                        left: 2,
                        right: 2,
                    },
                },
                series: [
                    {
                        name: labels,
                        data: data,
                        color: "#1A56DB",
                    },
                ],
                xaxis: {
                    labels: {
                        show: false,
                    },
                    axisBorder: {
                        show: false,
                    },
                    axisTicks: {
                        show: false,
                    },
                },
                yaxis: {
                    show: false,
                },
            }

            if (document.getElementById("area-chart") && typeof ApexCharts !== 'undefined') {
                const chart = new ApexCharts(document.getElementById("area-chart"), options);
                chart.render();
            }

        },
        createBrowsersCharts: function (response) {
            const getChartOptions = () => {
                return {
                    series: response.values,
                    colors: [
                        "#263bd8",
                        "#91628d",
                        "#d4aaf1",
                        "#aab045",
                        "#71cccd",
                        "#de388a",
                        "#a7935b",
                        "#5fb2fb",
                        "#fabb01",
                        "#51ab1c",
                        "#728251",
                        "#709e14",
                        "#2e4007",
                        "#a57837",
                        "#8f1672",
                        "#a76bd1",
                        "#5b6d38",
                        "#7cb7aa",
                        "#a140b7",
                        "#17855c",
                        "#4bb7ce",
                        "#a688b0",
                        "#5351b7",
                        "#569cfa",
                        "#8ca2d1",],
                    chart: {
                        height: 420,
                        width: "100%",
                        type: "pie",
                    },
                    stroke: {
                        colors: ["white"],
                        lineCap: "",
                    },
                    plotOptions: {
                        pie: {
                            labels: {
                                show: true,
                            },
                            size: "100%",
                            dataLabels: {
                                offset: -25
                            }
                        },
                    },
                    labels: response.keys,
                    dataLabels: {
                        enabled: true,
                        style: {
                            fontFamily: "Inter, sans-serif",
                        },
                    },
                    legend: {
                        position: "bottom",
                        fontFamily: "Inter, sans-serif",
                    },
                    yaxis: {
                        labels: {
                            formatter: function (value) {
                                return value + "%"
                            },
                        },
                    },
                    xaxis: {
                        labels: {
                            formatter: function (value) {
                                return value + "%"
                            },
                        },
                        axisTicks: {
                            show: false,
                        },
                        axisBorder: {
                            show: false,
                        },
                    },
                }
            }

            if (document.getElementById("pie-browsers") && typeof ApexCharts !== 'undefined') {
                const chart = new ApexCharts(document.getElementById("pie-browsers"), getChartOptions());
                chart.render();
            }
            // window.Chart && (new Chart(ctxBrowsers, {
            //     type: 'pie',
            //     data: {
            //         labels: response.keys,
            //         datasets: [{
            //             data: response.values,
            //             backgroundColor: [
            //                 "#263bd8",
            //                 "#91628d",
            //                 "#d4aaf1",
            //                 "#aab045",
            //                 "#71cccd",
            //                 "#de388a",
            //                 "#a7935b",
            //                 "#5fb2fb",
            //                 "#fabb01",
            //                 "#51ab1c",
            //                 "#728251",
            //                 "#709e14",
            //                 "#2e4007",
            //                 "#a57837",
            //                 "#8f1672",
            //                 "#a76bd1",
            //                 "#5b6d38",
            //                 "#7cb7aa",
            //                 "#a140b7",
            //                 "#17855c",
            //                 "#4bb7ce",
            //                 "#a688b0",
            //                 "#5351b7",
            //                 "#569cfa",
            //                 "#8ca2d1",
            //             ],
            //             borderColor: [
            //                 '#e7505abf'
            //             ],
            //             borderWidth: 0,
            //         }]
            //     },
            //     options: {
            //         responsive: true,
            //         maintainAspectRatio: false,
            //         plugins: {
            //             legend: {
            //                 display: false,
            //             }
            //         },
            //         animation: {
            //             animateScale: true,
            //             animateRotate: true
            //         }
            //     }
            // })).render();
        },
        createOsCharts: function (response) {
            function getRandomColor() {
                var letters = '0123456789ABCDEF';
                var color = '#';
                for (var i = 0; i < 6; i++) {
                    color += letters[Math.floor(Math.random() * 16)];
                }
                return color;
            }

            // Example usage:
            var randomColor = getRandomColor();
            const getChartOptions = () => {
                return {
                    series: response.values,
                    colors: randomColor,
                    chart: {
                        height: 420,
                        width: "100%",
                        type: "pie",
                    },
                    stroke: {
                        colors: ["white"],
                        lineCap: "",
                    },
                    plotOptions: {
                        pie: {
                            labels: {
                                show: true,
                            },
                            size: "100%",
                            dataLabels: {
                                offset: -25
                            }
                        },
                    },
                    labels: response.keys,
                    dataLabels: {
                        enabled: true,
                        style: {
                            fontFamily: "Inter, sans-serif",
                        },
                    },
                    legend: {
                        position: "bottom",
                        fontFamily: "Inter, sans-serif",
                    },
                    yaxis: {
                        labels: {
                            formatter: function (value) {
                                return value + "%"
                            },
                        },
                    },
                    xaxis: {
                        labels: {
                            formatter: function (value) {
                                return value + "%"
                            },
                        },
                        axisTicks: {
                            show: false,
                        },
                        axisBorder: {
                            show: false,
                        },
                    },
                }
            }

            if (document.getElementById("pie-os") && typeof ApexCharts !== 'undefined') {
                const chart = new ApexCharts(document.getElementById("pie-os"), getChartOptions());
                chart.render();
            }
            // window.Chart && (new Chart(ctxOs, {
            //     type: 'pie',
            //     data: {
            //         labels: response.keys,
            //         datasets: [{
            //             data: response.values,
            //             backgroundColor: [
            //                 "#52ebad",
            //                 "#f75345",
            //                 "#9b5aed",
            //                 "#9a3cb",
            //                 "#51a62d",
            //                 "#af3ca2",
            //                 "#fab325",
            //                 "#39a474",
            //                 "#95c55e",
            //                 "#38d692",
            //                 "#e46126",
            //                 "#f68f56",
            //                 "#62c4df",
            //                 "#fbcd37",
            //                 "#33edba",
            //                 "#bbb4b8",
            //                 "#af6189",
            //                 "#21bdb",
            //                 "#1e106a",
            //                 "#817221",
            //                 "#431c09",
            //                 "#91c508",
            //                 "#355b62",
            //                 "#697079",
            //                 "#de3ae4",
            //             ],
            //             borderColor: [
            //                 '#e7505abf'
            //             ],
            //             borderWidth: 0,
            //         }]
            //     },
            //     options: {
            //         responsive: true,
            //         maintainAspectRatio: false,
            //         plugins: {
            //             legend: {
            //                 display: false,
            //             }
            //         },
            //     }
            // })).render();
        },
        createOCountriesCharts: function (response) {
            function getRandomColor() {
                var letters = '0123456789ABCDEF';
                var color = '#';
                for (var i = 0; i < 6; i++) {
                    color += letters[Math.floor(Math.random() * 16)];
                }
                return color;
            }

            // Example usage:
            var randomColor = getRandomColor();
            const getChartOptions = () => {
                return {
                    series: response.values,
                    colors: randomColor,
                    chart: {
                        height: 420,
                        width: "100%",
                        type: "pie",
                    },
                    stroke: {
                        colors: ["white"],
                        lineCap: "",
                    },
                    plotOptions: {
                        pie: {
                            labels: {
                                show: true,
                            },
                            size: "100%",
                            dataLabels: {
                                offset: -25
                            }
                        },
                    },
                    labels: response.keys,
                    dataLabels: {
                        enabled: true,
                        style: {
                            fontFamily: "Inter, sans-serif",
                        },
                    },
                    legend: {
                        position: "bottom",
                        fontFamily: "Inter, sans-serif",
                    },
                    yaxis: {
                        labels: {
                            formatter: function (value) {
                                return value + "%"
                            },
                        },
                    },
                    xaxis: {
                        labels: {
                            formatter: function (value) {
                                return value + "%"
                            },
                        },
                        axisTicks: {
                            show: false,
                        },
                        axisBorder: {
                            show: false,
                        },
                    },
                }
            }

            if (document.getElementById("pie-country") && typeof ApexCharts !== 'undefined') {
                const chart = new ApexCharts(document.getElementById("pie-country"), getChartOptions());
                chart.render();
            }
            // window.Chart && (new Chart(ctxCountries, {
            //     type: 'pie',
            //     data: {
            //         labels: response.keys,
            //         datasets: [{
            //             data: response.values,
            //             backgroundColor: [
            //                 "#2ccf1b",
            //                 "#42ea",
            //                 "#6e1dc4",
            //                 "#bf1f98",
            //                 "#f5ffb2",
            //                 "#4bfce4",
            //                 "#bb9416",
            //                 "#460716",
            //                 "#3fc812",
            //                 "#86b104",
            //                 "#c5fe39",
            //                 "#29e230",
            //                 "#66b8dc",
            //                 "#9f5927",
            //                 "#28702c",
            //                 "#abe28c",
            //                 "#9fc9ef",
            //                 "#d50909",
            //                 "#aecc6f",
            //                 "#39540c",
            //                 "#bc9623",
            //                 "#d93b8b",
            //                 "#b907d1",
            //                 "#436948",
            //                 "#9ea635",
            //             ],
            //             borderColor: [
            //                 '#e7505abf'
            //             ],
            //             borderWidth: 0,
            //         }]
            //     },
            //     options: {
            //         responsive: true,
            //         maintainAspectRatio: false,
            //         plugins: {
            //             legend: {
            //                 display: false,
            //             }
            //         },
            //     }
            // })).render();
        }
    }
    charts.initEarnings();
    charts.initUsers();
    if (ctxOs.length || ctxBrowsers.length || ctxCountries.length) {
        charts.initLogs();
    }
})(jQuery);