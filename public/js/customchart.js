//doughnut chart for different blood group

var styles = document.querySelector(":root");
var defaultStyles = getComputedStyle(styles);
var darkColor = defaultStyles.getPropertyValue("--color-primary");

Chart.defaults.font.size = 15;
Chart.defaults.color = darkColor;
Chart.defaults.borderColor = "rgba(255, 99, 132, 0.3)";

var AllDonors = document.getElementById("myStuff");
var AllDonorsGroupData = new Chart(AllDonors, {
	type: "doughnut",
	options: {
		responsive: true,
		plugins: {
			legend: {
				position: "bottom",
			},
			title: {
				display: true,
				text: "Total Students Each Year",
			},
		},
	},
	data: {
		datasets: [
			{
				label: "Total number of Donors with different group",
				data: [60, 55, 48, 47],
				backgroundColor: [/* "rgba(255, 99, 132, 0.7)", "rgba(245, 99, 22, 0.3)", "rgba(155, 122, 132, 1)", "rgba(175, 192, 192, 0.7)"*/ "rgba(25, 152, 92, 0.7)", "rgba(4, 2, 135, 0.7)", "rgba(255, 206, 86, 0.6)", "rgba(255, 0, 0, 0.5)"],
				borderColor: ["rgba(255, 99, 132, 1)", "rgba(75, 192, 192, 1)", "rgba(175, 152, 192, 1)", "rgba(54, 162, 235, 1)", "rgba(255, 206, 86, 1)", "rgba(135, 105, 106, 1)"],
				borderWidth: 0.5,
			},
		],
		labels: ["First Year", "Second Year", "Third Year", "Fourth Year"],
	},
});

//Bar chart

var allVisitors = document.getElementById("myChart");

const allVisitorsList = new Chart(allVisitors, {
	type: "bar",
	data: {
		labels: ["Sat", "Sun", "Mon", "Tue", "Wed", "Thus", "Fri"],
		fontColor: "red",
		datasets: [
			{
				label: "Weekly Visitors Analytics",
				data: [1200, 1909, 3000, 5000, 2000, 3000, 3900],
				backgroundColor: ["rgba(255, 99, 132, 0.7)", "rgba(54, 162, 235, 0.6)", "rgba(255, 206, 86, 0.7)", "rgba(75, 192, 192, 0.5)", "rgba(153, 102, 255, 0.7)", "rgba(255, 159, 64, 0.8)", "rgba(5, 106, 86, 0.7)"],
				borderColor: ["rgba(255, 99, 132, 1)", "rgba(54, 162, 235, 1)", "rgba(255, 206, 86, 1)", "rgba(75, 192, 192, 1)", "rgba(153, 102, 255, 1)", "rgba(255, 159, 64, 1)", "rgba(5, 106, 86, 1)"],
				borderWidth: 1,
			},
		],
	},
});
