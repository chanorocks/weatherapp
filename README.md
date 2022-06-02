<h1 align="center">
  Japan Weather App
</h1>
<h4 align="center">
 For the City of Tokyo, Yokohama, Kyoto, Osaka, Sapporo and Nagoya.
</h4>

[Live Demo](http://149.28.155.195/)

## 🧐 Features

Just visit and feel the simplicity of the webapp.
It will also give you easy access to famous city of Japan with its corresponding daily weather forecast and nearby places to visit.

- **Weather Forecast**

- **Daily with 3 hours interval**

- **Nearby places to visit**

- **Simple and Elegant Design**

## ❤️ Why this app

- **Easy to setup and modify**

- **Straight forward features**

- **Small size and fast loading**

- **Mobile Ready**

## 🛠️ Installation Steps (Backend)

1. Clone the repository

```bash
git clone https://github.com/itsmeSryx/weatherapp.git
```

2. Change the working directory

```bash
cd weatherapp/bizmate-backend
```

3. Install composer and dependencies

```bash
composer install
npm install
```

4. Add your Foursquare and OpenWeather API

```bash
OPENWEATHERMAP_API=

FOURSQUARE_API=
FOURSQUARE_CLIENT_ID=
FOURSQUARE_SECRET=
```

4. Install key and start project

```bash
php artisan key:generate
php artisan serve
```

## 🛠️ Installation Steps (Frontend)

1. Change the working directory

```bash
cd weatherapp/frontend
```
2. Update .env and change to your API URL

```bash
VUE_APP_API_URL=http://localhost:8000/api
```

3. Install composer and dependencies

```bash
npm install
```

4. Start project

```bash
npm run serve
```

🌟 You are all set!

## 💻 Built with

- [Laravel9](https://laravel.com/docs/9.x)
- [VueJS3](https://vuejs.org/)
- [Bootstrap](https://tailwindcss.com/): for styling
- [Bootstrapmade](https://bootstrapmade.com/demo/OnePage/): for template
