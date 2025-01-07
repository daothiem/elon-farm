$.ajaxSetup(
    {
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    }
);

async function checkURL(data) {

    let res = await $.post('/api/checkURL', data);
    if (!res?.success) return false
    return res.data

}

function ChangeToSlug(title) {
    var slug = title.toLowerCase();

    // Chuẩn hóa các ký tự tiếng Việt có dấu
    slug = slug.normalize('NFD').replace(/[\u0300-\u036f]/g, ''); // Loại bỏ dấu
    slug = slug.replace(/đ/g, 'd'); // Chuyển 'đ' thành 'd'

    // Loại bỏ các ký tự đặc biệt
    slug = slug.replace(/[^a-z0-9\s\-]/g, ''); // Chỉ giữ chữ, số, khoảng trắng và dấu gạch ngang

    // Chuyển khoảng trắng thành dấu gạch ngang
    slug = slug.replace(/\s+/g, '-');

    // Xóa các dấu gạch ngang thừa
    slug = slug.replace(/-+/g, '-');

    // Xóa dấu gạch ngang ở đầu và cuối
    slug = slug.replace(/^-+|-+$/g, '');

    return slug;
}


function convertMoney(number, param = ',') {
    const numbers = number.replaceAll(param, '');
    return numbers.replace(/\B(?=(\d{3})+(?!\d))/g, param);
}

async function getImagePrice(priceId) {
    return await $.get('/api/getImagePrice', {
        priceId: priceId
    });
}

async function getData(url, param = '') {
    return await $.get(url, {
        param: param
    });
}

async function getPreview(data) {
    return await $.post('/api/get-preview', data);
}

async function insertTag(name) {
    return $.post('/api/create/tag', name);
}

function getImagesProduct(productId) {
    return $.get('/api/product/images', {
        param: productId
    });
}
$(document).ready(function () {
    $('.select_ordering').change(function () {
        $(this).parents('form').submit();
    })
})
