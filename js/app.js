const HOST = `${window.location.protocol}//${window.location.host}`;

// The backend url can be changed from "webasyst" to anything.
// Look to getSettingsScript helper in the openaiViewHelper class how it adds settings to the window.openai object.
const WA_APP_URL = window.oaiptest.backendApiUrl;

const getCsrf = () => {
  const matches = document.cookie.match(new RegExp("(?:^|; )_csrf=([^;]*)"));
  if (matches && matches[1]) {
    return decodeURIComponent(matches[1]);
  }
  return '';
};

const checkResponseValidity = async (response, status = 200, displayMessage = 'API Error') => {
  if (response.status !== status) {
    const responseBody = await response.json();

    throw {
      ...responseBody,
      displayMessage,
    };
  }

  const responseBody = await response.json();

  if (responseBody.status !== 'ok') {
    throw {
      ...responseBody,
      displayMessage,
    };
  }

  return responseBody;
};

const api = {
  async testIP () {
    const formData = new FormData();
    formData.append('_csrf', getCsrf());

    const response = await fetch(`${HOST}${WA_APP_URL}?module=backend&action=oaiptestApiTest`, {
      method: 'POST',
      body: formData
    });

    const responseBody = await checkResponseValidity(response, 200, "Ошибка при получении ответа!");

    return responseBody.data;
  },
};

async function run() {
  const appElement = document.querySelector('#oaiptest-app');
  const h1Element = appElement.querySelector('h1');

  await api
    .testIP()
    .then(() => {
      h1Element.innerText = '🎉 IP вашего хостинга не заблокирован! 🎉';
      h1Element.style.color = 'green';
    })
    .catch(() => {
      h1Element.innerText = '😭 IP вашего хостинга заблокирован! 😭';
      h1Element.style.color = 'red';
    });
}
run();