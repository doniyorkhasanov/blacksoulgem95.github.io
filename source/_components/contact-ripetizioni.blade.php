<div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
     id="{{$id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog relative w-auto pointer-events-none">
        <div
                class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
            <div
                    class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
                <h5 class="text-xl my-0 font-medium leading-normal text-gray-800" id="exampleModalLabel">Contattami</h5>
                <button type="button"
                        class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
                        data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body relative p-4">
                <div id="tripetto"></div>
            </div>
        </div>
    </div>
</div>


@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/tripetto-runner-foundation"></script>
<script src="https://cdn.jsdelivr.net/npm/tripetto-runner-chat"></script>
<script src="https://cdn.jsdelivr.net/npm/tripetto-services"></script>
<script>
    var tripetto = TripettoServices.init({token: "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyIjoia1pIektua25GQi82R3BHWXNaTW9IMG9EZkZYR0xWSDM2ZThCckhYZGw2TT0iLCJkZWZpbml0aW9uIjoiV0ZyVXFYZjEyZGZQSXVSRklxOExacWszeXdXaGN1Tmx2Qk5IaFo5eWFJTT0iLCJ0eXBlIjoiY29sbGVjdCJ9.zydBrpaAC3PzGhcKmlfCoM24XrJ9jgiA2CholL5z07Q"});

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
@endpush