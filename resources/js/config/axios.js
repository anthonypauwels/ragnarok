export default {
    common : {
        'X-Requested-With': 'XMLHttpRequest',
        'X-CSRF-TOKEN' : document.querySelector('meta[name="csrf-token"]')?.getAttribute('content'),
    }
};
