$(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).on('click', '.whatsAppBtn', function () {
        let phoneNumber = $(this).attr('data-vendorPhone'); // Replace with the desired phone number

        const countryCode = '92'; // Replace with the desired country code
        // Remove leading zeros
        phoneNumber = phoneNumber.replace(/^0+/, '');

        // Add the country code
        phoneNumber = `${countryCode}${phoneNumber}`;
        let productName = $(this).attr('data-productName');
        let description = 'Please share more details';
        let website = "Market Price Book";
        let sender = $(this).attr('data-UserName');
        let productLink = $(this).attr('data-ProductLink');
        let from = phoneNumber;

        let url =
            "https://api.whatsapp.com/send?text=" +
            "Product: " +
            productName +
            "%0a" +
            "Description: " +
            description +
            "%0a" +
            "Sender :" +
            sender +
            "%0a" +
            "Product Link : " +
            productLink
            "%0a" +
            "Website: " +
            website +
            "&phone=" +
            from;
        window.open(url, "_blank").focus();
    })
});
