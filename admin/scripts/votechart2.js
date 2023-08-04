var xValues = ["SBM 01", "SBM 02","SBM 03"];
var yValues = [0,3,2];
var barColors = ["red", "green","blue"];

new Chart("sbm", {
  type: "bar",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    scales: {
      yAxes: [{
        display: true,
        ticks: {
            beginAtZero: true,
            steps: 10,
            stepValue: 5,
            max: 30
        }
    }]
    },
    legend: {display: false},
    title: {
      display: true,
      text: "School of Business Management",
      
    }
  }
});

var xValues = ["IBS 01", "IBS 02","IBS 03"];
var yValues = [1, 0, 4];
var barColors = ["red", "green","blue"];

new Chart("ibs", {
  type: "bar",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    scales: {
      yAxes: [{
        display: true,
        ticks: {
            beginAtZero: true,
            steps: 10,
            stepValue: 5,
            max: 30
        }
    }]
    },
    legend: {display: false},
    title: {
      display: true,
      text: "Islamic Business School"
    }
  }
});

var xValues = ["SCIMPA 01", "SCIMPA 02","SCIMPA 03"];
var yValues = [0, 0, 5];
var barColors = ["red", "green","blue"];

new Chart("scimpa", {
  type: "bar",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    scales: {
      yAxes: [{
        display: true,
        ticks: {
            beginAtZero: true,
            steps: 10,
            stepValue: 5,
            max: 30
        }
    }]
    },
    legend: {display: false},
    title: {
      display: true,
      text: "School of Creative Industry Management and Performing Arts"
    }
  }
});



var xValues = ["SOE 01", "SOE 02","SOE 03"];
var yValues = [1, 2, 2];
var barColors = ["red", "green","blue"];

new Chart("soe", {
  type: "bar",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    scales: {
      yAxes: [{
        display: true,
        ticks: {
            beginAtZero: true,
            steps: 10,
            stepValue: 5,
            max: 30
        }
    }]
    },
    legend: {display: false},
    title: {
      display: true,
      text: "School of Education"
    }
  }
});

var xValues = ["SOG 01", "SOG 02","SOG 03"];
var yValues = [3, 0, 2];
var barColors = ["red", "green","blue"];

new Chart("sog", {
  type: "bar",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    scales: {
      yAxes: [{
        display: true,
        ticks: {
            beginAtZero: true,
            steps: 10,
            stepValue: 5,
            max: 30
        }
    }]
    },
    legend: {display: false},
    title: {
      display: true,
      text: "School of Government"
    }
  }
});

var xValues = ["SOIS 01", "SOIS 02","SOIS 03"];
var yValues = [2, 1, 2];
var barColors = ["red", "green","blue"];

new Chart("sois", {
  type: "bar",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    scales: {
      yAxes: [{
        display: true,
        ticks: {
            beginAtZero: true,
            steps: 10,
            stepValue: 5,
            max: 30
        }
    }]
    },
    legend: {display: false},
    title: {
      display: true,
      text: "School of International Studies"
    }
  }
});

var xValues = ["SOL 01", "SOL 02","SOL 03"];
var yValues = [0, 0, 5];
var barColors = ["red", "green","blue"];

new Chart("sol", {
  type: "bar",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    scales: {
      yAxes: [{
        display: true,
        ticks: {
            beginAtZero: true,
            steps: 10,
            stepValue: 5,
            max: 30
        }
    }]
    },
    legend: {display: false},
    title: {
      display: true,
      text: "School of Law"
    }
  }
});