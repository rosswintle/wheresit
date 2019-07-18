const vendor = document.getElementById('vendor-input');
const locations = document.querySelectorAll('#location-input option');

vendor.addEventListener('change', setLocations);

function setLocations(e) {
    const vendorId = e.target.value;
    locations.forEach( function(location) {
        if (location.dataset.vendor == vendorId) {
            location.classList.remove('hidden');
        } else {
            location.classList.add('hidden');
        }
    })
}
