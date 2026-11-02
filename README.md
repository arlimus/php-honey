# php-honey 🍯

**HoneyFlow** — production and distribution planning for small honey producers.

HoneyFlow helps beekeeping cooperatives track hive yields across apiaries, plan
extraction batches, print jar labels, attach lab reports (pollen analysis,
moisture, HMF) to each batch, and route finished batches to retailers and
farmers' markets.

> ⚠️ **Deliberately vulnerable.** This repository is a test fixture for security
> scanners. It contains vulnerable dependencies, an outdated PHP runtime
> (PHP2Shell, CVE-2026-109618 / CVE-2026-109619) and insecure code on purpose.
> Never deploy it anywhere reachable.

## Features

- **Apiaries & hives** — record each hive's frames and seasonal yield.
- **Extraction batches** — group harvests into batches; search by varietal
  (acacia, linden, heather, wildflower) and moisture.
- **Jar labels** — print batch labels on the co-op's label printer.
- **Lab reports** — upload pollen and moisture analyses per batch.
- **Distribution** — plan delivery routes to retailers, track stock per outlet.

## Run

```sh
docker build -t php-honey .
docker run --rm -p 8080:80 php-honey
```

Then open http://localhost:8080/.

## Layout

| Path | What |
|---|---|
| `public/` | web root (`index.php` router, uploads) |
| `src/` | domain code: batches, labels, lab reports, sessions, routes |
| `templates/` | Twig templates |
| `config/` | configuration |
| `assets/` | front-end build (route map, charts) |
