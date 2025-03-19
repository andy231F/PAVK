function openTwitterTabs(evt, TwitterTabs) {
  var i, tabcontent, tablinks;

  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }

  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }

  document.getElementById(TwitterTabs).style.display = "block";
  evt.currentTarget.className += " active";
}

function setDefaultTab() {
  var firstTabLink = document.getElementsByClassName("tablinks")[0]; 
  firstTabLink.click(); 
}

window.onload = setDefaultTab;