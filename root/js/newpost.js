function changePostType() {
  var tractor = "img/icon/tractor.svg"
  var greens = "img/icon/greens.svg"
  var img = document.getElementById('typeImg');
  var category = document.getElementById('category')
  if (category.getAttribute('value') == 'false') {
    img.setAttribute('src', greens);
    category.setAttribute('value', 'true');
  } else {
    img.setAttribute('src', tractor);
    category.setAttribute('value', 'false');
  }
}
  
