$('i.glyphicon-refresh-animate').hide();
function updateItems(r) {
    _opts.items.avaliable = r.avaliable;
    _opts.items.assigned = r.assigned;
    search('avaliable');
    search('assigned');
}

$('.btn-assign').click(function () {
    var $this = $(this);
    var target = $this.data('target');
    var items = $('select.list[data-target="' + target + '"]').val();

    if (items && items.length) {
        $this.children('i.glyphicon-refresh-animate').show();
        $.post($this.attr('href'), {items: items}, function (r) {
            updateItems(r);
        }).always(function () {
            $this.children('i.glyphicon-refresh-animate').hide();
        });
    }
    return false;
});

$('.search[data-target]').keyup(function () {
    search($(this).data('target'));
});

function search(target) {
    var $list = $('select.list[data-target="' + target + '"]');
    $list.html('');
    var q = $('.search[data-target="' + target + '"]').val();

    var groups = {
        role: [$('<optgroup label="角色">'), false],
        permission: [$('<optgroup label="权限">'), false],
        route: [$('<optgroup label="操作">'), false],
    }; 
    $.each(_opts.items[target], function (name, group) {
    	var arr=name.split('|');
//    	console.log(group);
        if (name.indexOf(q) >= 0) {
        	if('permission'==group) {
        		$('<option>').text(arr[0]).val(arr[0]).appendTo(groups[group][0]);
                groups[group][1] = true;
        	}
        	if('route'==group) {
        		if(arr[1]) {
        			$('<option>').text(arr[1]).val(arr[0]).appendTo(groups[group][0]);
                    groups[group][1] = true;
        		} else {
        			$('<option>').text(name).val(arr[0]).appendTo(groups[group][0]);
                    groups[group][1] = true;
        		}
        		
        	}
        	if('role'==group) {
        		$('<option>').text(name).val(name).appendTo(groups[group][0]);
                groups[group][1] = true;
        	}
             
        }
    });
    $.each(groups, function () {
        if (this[1]) {
            $list.append(this[0]);
        }
    });
}

// initial
search('avaliable');
search('assigned');
