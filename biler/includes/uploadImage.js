/**
 * Created by Majd on 10/02/2015.
 */
try {function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blah')
                .attr('src', e.target.result)
                .width(92)
                .height(auto_center_thickbox());
            form.getElementById('blah').setAttribute('style','visibility:visible');
        };

        reader.readAsDataURL(input.files[0]);
    }
}
} catch (error) { throw error; }

try {function readURL2(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blah1')
                .attr('src', e.target.result)
                .width(92)
                .height(auto_center_thickbox());
        };

        reader.readAsDataURL(input.files[0]);
    }
}
} catch (error) { throw error; }

try {function readURL3(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blah2')
                .attr('src', e.target.result)
                .width(92)
                .height(auto_center_thickbox());
        };

        reader.readAsDataURL(input.files[0]);
    }
}
} catch (error) { throw error; }
try {function readURL4(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blah3')
                .attr('src', e.target.result)
                .width(92)
                .height(auto_center_thickbox());
        };

        reader.readAsDataURL(input.files[0]);
    }
}
} catch (error) { throw error; }
//# sourceURL=uboqu3.js