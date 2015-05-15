(function($) {
    $(document).ready(function() {
        $('.ActivitiesByDay').height("350");
    });

    friendsReports.graphs.ActivitiesByDay = {
        chart: function() {
            var chart = c3.generate({
                bindto: '#ActivitiesByDay',
                color: {
                    pattern: ['#95B753', '#CC3300'],
                },
                data: {
                    x: 'x',
                    columns: this.data,
                    names: {
                        data: '# of Activities Completed',
                    },
                    type: 'bar',
                },
                axis: {
                    x: {
                        type: 'timeseries',
                        tick: {
                            count: 15,
                            format: '%m/%d/%Y'
                        }
                    },
                    y: {
                        label: '# of Activities'
                    },
                },
                bar: {
                    width: {
                        ratio: 0.2
                    }
                }
            });
        }
    };

})(window.jQuery);