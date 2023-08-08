function showNotification(text, type) {
    $.notify(
        {
            icon: "fa-solid fa-bell",
            message: text,
        },
        {
            type: type,
            timer: 500,
            placement: {
                from: "top",
                align: "right",
            },
            showProgressbar: false,
            allow_dismiss: true,
        }
    );
}
