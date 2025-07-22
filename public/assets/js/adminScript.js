

async function deleteSiteInfo(url) {
    try {
        const response = await fetch(url, { method: 'POST' });
        if (response.ok) {
            loadMe('http://localhost/tawseelOnline/siteinfo');
        } else {
            const errorData = await response.json();
            console.error('Error deleting site info:', errorData.message);
            alert('Error: ' + errorData.message);
        }
    } catch (error) {
        console.error('Error fetching site data:', error);
        alert('An error occurred while trying to delete the record.');
    }
}


async function deleteHomeInfo(url) {
    try {
        const response = await fetch(url, { method: 'POST' });
        if (response.ok) {
            loadMe('http://localhost/tawseelOnline/homeinfo');
        } else {
            const errorData = await response.json();
            console.error('Error deleting home info:', errorData.message);
            alert('Error: ' + errorData.message);
        }
    } catch (error) {
        console.error('Error fetching site data:', error);
        alert('An error occurred while trying to delete the record.');
    }
}


async function deleteKeyHighlight(url) {
    try {
        const response = await fetch(url, { method: 'POST' });
        if (response.ok) {
            loadMe('http://localhost/tawseelOnline/keyhighlight');
        } else {
            const errorData = await response.json();
            console.error('Error deleting home info:', errorData.message);
            alert('Error: ' + errorData.message);
        }
    } catch (error) {
        console.error('Error fetching site data:', error);
        alert('An error occurred while trying to delete the record.');
    }
}

async function deletePartner(url) {
    try {
        const response = await fetch(url, { method: 'POST' });
        if (response.ok) {
            loadMe('http://localhost/tawseelOnline/partnership');
        } else {
            const errorData = await response.json();
            console.error('Error deleting home info:', errorData.message);
            alert('Error: ' + errorData.message);
        }
    } catch (error) {
        console.error('Error fetching site data:', error);
        alert('An error occurred while trying to delete the record.');
    }
}

async function deletePartnerItem(url) {
    try {
        const response = await fetch(url, { method: 'POST' });
        if (response.ok) {
            loadMe('http://localhost/tawseelOnline/partnershipitem');
        } else {
            const errorData = await response.json();
            console.error('Error deleting home info:', errorData.message);
            alert('Error: ' + errorData.message);
        }
    } catch (error) {
        console.error('Error fetching site data:', error);
        alert('An error occurred while trying to delete the record.');
    }
}


async function deleteMenu(url) {
    try {
        const response = await fetch(url, { method: 'DELETE' });

        if (response.ok) {
            loadMe('http://localhost/tawseelOnline/menus');
        } else {
            const errorData = await response.json();
            console.error('Error deleting home info:', errorData.message);
            alert('Error: ' + errorData.message);
        }
    } catch (error) {
        console.error('Error fetching site data:', error);
        alert('An error occurred while trying to delete the record.');
    }
}


