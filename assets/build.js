// Builds the delivery route map and yield charts into public/js.
const fs = require('fs');
const path = require('path');
const _ = require('lodash');

const routes = require('./routes.json');
const byOutlet = _.groupBy(routes, 'outlet');
const out = path.join(__dirname, '..', 'public', 'js', 'routes.js');

fs.mkdirSync(path.dirname(out), { recursive: true });
fs.writeFileSync(out, 'window.HONEYFLOW_ROUTES = ' + JSON.stringify(byOutlet) + ';\n');
