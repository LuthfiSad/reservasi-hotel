<script>
  /* global Chart:false */

  $(function() {
    'use strict'

    var ticksStyle = {
      fontColor: '#495057',
      fontStyle: 'bold'
    }

    var mode = 'index'
    var intersect = true
    var $infosales = $('#info-sales')
    // eslint-disable-next-line no-unused-vars
    var infosales = new Chart($infosales, {
      type: 'bar',
      data: {
        labels: ['Info Status', 'Data Baru', 'Data Yang DiTolak', 'Data Yang Diterima', 'Data Yang Selesai'],
        datasets: [{
          backgroundColor: ['#ffc107'],
          borderColor: '#007bff',
          data: [<?= $rowwait ?>]
        }, {
          backgroundColor: ['#0dcaf0', '#6c757d',
            '#212529', '#20c997', '#198754'
          ],
          borderColor: '#007bff',
          data: [<?= $rowin ?>, <?= $rowbaru ?>, <?= $rowsts3 ?>, <?= $rowsts2 ?>, <?= $rowsts4 ?>]
        }, {
          backgroundColor: ['#0d6efd'],
          borderColor: '#007bff',
          data: [<?= $rowout ?>]
        }]
      },
      options: {
        maintainAspectRatio: false,
        tooltips: {
          mode: mode,
          intersect: intersect
        },
        hover: {
          mode: mode,
          intersect: intersect
        },
        legend: {
          display: false
        },
        scales: {
          yAxes: [{
            // display: false,
            gridLines: {
              display: true,
              lineWidth: '4px',
              color: 'rgba(0, 0, 0, .2)',
              zeroLineColor: 'transparent'
            },
            ticks: $.extend({
              beginAtZero: true,
              suggestedMax: 10
            }, ticksStyle)
          }],
          xAxes: [{
            display: true,
            gridLines: {
              display: false
            },
            ticks: ticksStyle
          }]
        }
      }
    })

    <?php if ($_SESSION['level'] == 'Admin') { ?>
      var $infohotel = $('#info-hotel')
      // eslint-disable-next-line no-unused-vars
      var infohotel = new Chart($infohotel, {
        data: {
          labels: ['Data Kamar', 'Data Fasilitas Kamar', 'Data Fasilitas Hotel'],
          datasets: [{
            type: 'line',
            data: [<?= $rowkamar ?>, <?= $rowfaskamar ?>, <?= $rowfashotel ?>],
            backgroundColor: 'transparent',
            borderColor: '#fd7e14',
            pointBorderColor: '#d63384',
            pointBackgroundColor: '#dc3545',
            fill: false
            // pointHoverBackgroundColor: '#007bff',
            // pointHoverBorderColor    : '#007bff'
          }]
        },
        options: {
          maintainAspectRatio: false,
          tooltips: {
            mode: mode,
            intersect: intersect
          },
          hover: {
            mode: mode,
            intersect: intersect
          },
          legend: {
            display: false
          },
          scales: {
            yAxes: [{
              // display: false,
              gridLines: {
                display: true,
                lineWidth: '4px',
                color: 'rgba(0, 0, 0, .2)',
                zeroLineColor: 'transparent'
              },
              ticks: $.extend({
                beginAtZero: true,
                suggestedMax: 10
              }, ticksStyle)
            }],
            xAxes: [{
              display: true,
              gridLines: {
                display: false
              },
              ticks: ticksStyle
            }]
          }
        }
      })

    <?php } ?>
  })

  // lgtm [js/unused-local-variable]
</script>