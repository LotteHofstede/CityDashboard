// SET PACKERY LAYOUT
docReady( function() {
  var container = document.querySelector('.packery');
  var pckry = new Packery( container, {
    columnWidth: 300,
    rowHeight: 90,
    gutter: 5
  });
});