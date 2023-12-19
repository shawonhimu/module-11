var sidetitles = document.querySelectorAll(".sideTitle");

function sidebarToggler(adminSidebarID, adminContentBarID) {
	var adminContentBar = document.getElementById(adminContentBarID);
	var adminSidebar = document.getElementById(adminSidebarID);
	if (adminSidebar.style.width <= "18%") {
		adminSidebar.style.width = "5%";
		adminContentBar.style.width = "95%";

		console.log(adminSidebar.style.width);
		for (let i = 0; i < sidetitles.length; i++) {
			const sidetitle = sidetitles[i];
			//console.log(sidetitle);
			sidetitle.classList.add("d-none");
		}
	} else {
		adminSidebar.style.width = "18%";
		adminContentBar.style.width = "82%";
		for (let i = 0; i < sidetitles.length; i++) {
			const sidetitle = sidetitles[i];
			//console.log(sidetitle);
			sidetitle.classList.remove("d-none");
		}
	}
}
