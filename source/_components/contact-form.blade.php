<div id="tripetto"></div>
<script src="https://cdn.jsdelivr.net/npm/tripetto-runner-foundation"></script>
<script src="https://cdn.jsdelivr.net/npm/tripetto-runner-chat"></script>
<script src="https://cdn.jsdelivr.net/npm/tripetto-services"></script>
<script>
    var tripetto = TripettoServices.init({ token: "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyIjoia1pIektua25GQi82R3BHWXNaTW9IMG9EZkZYR0xWSDM2ZThCckhYZGw2TT0iLCJkZWZpbml0aW9uIjoiaEJSZW5nRDd5T3dsUEJJM0ZmKy9rYzAweTNrY1VCeW9xbDJrUDJSMW5IRT0iLCJ0eXBlIjoiY29sbGVjdCJ9.6E-sgHJFNNSmLZmQrplD8067ucIFbh1i5rTleSFwmek" });

    TripettoChat.run({
        element: document.getElementById("tripetto"),
        definition: tripetto.definition,
        styles: tripetto.styles,
        l10n: tripetto.l10n,
        locale: tripetto.locale,
        translations: tripetto.translations,
        attachments: tripetto.attachments,
        onSubmit: tripetto.onSubmit
    });
</script>