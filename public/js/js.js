$( "#autocomplete").focus();

// $( "#autocomplete" ).autocomplete({
// 	source: '/autocomplete',
// 	minlength:3,
// 	autoFocus:true,
// })
// .data('ui-autocomplete')._renderItem = function(ul, item) {
//     return $('<li>')
//         .data('ui-autocomplete-item', item)
//         .append(item.label + '<img src="' + item.image + '" alt="" />')
//         .appendTo(ul);
// };

$("#autocomplete").autocomplete({
    source: "/autocomplete" // name of controller followed by function
  	}).data( "ui-autocomplete" )._renderItem = function( ul, item ) {
        // var inner_html = '<a><div class="list_item_container"><div class="image"><img src="' + item.image + '"></div><div class="label">' + item.label + '</div><div class="description">' + item.description + '</div></div></a>';
        var inner_html = '<a><div class="list_item_container"><div class="image"><img src="http://loremflickr.com/60/88"></div><div class="label">' + item.label + '</div><div class="description">' + item.description + '</div></div></a>';
        return $( "<li></li>" )
            .data( "item.autocomplete", item )
            .append(inner_html)
            .appendTo( ul );
    };