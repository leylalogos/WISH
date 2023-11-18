$(document).ready(function () {
    const supported = "contacts" in navigator && "ContactsManager" in window;
    if (!supported) {
        $("#fetch-contacts-btn").remove();
    }

    $("#fetch-contacts-btn").click(function () {
        getContacts();
    });
});

async function getContacts() {
    const props = ["name", "tel", "email"];
    const opts = { multiple: true };

    try {
        const contacts = await navigator.contacts.select(props, opts);
        // alert(contacts);
        $.post(
            base_url + "/contacts/fetch",
            { contacts: contacts },
            function (data, status) {
                //refresh the page
                window.location.reload();
            }
        ).fail(function (data) {
            alert(JSON.stringify(data));
        });
    } catch (err) {
        alert(err);
    }
}
