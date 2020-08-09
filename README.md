# ReportJet

ReportJet is a project idea that allows you to upload a tar.gz bundle of test reports (or any test outputs) and be able to view them in a web UI. It's a quick and dirty POC right now.

## Running ReportJet locally

```
php artisan serve
```

## Submitting a new test bundle

```
curl -X POST 127.0.0.1:8000/api/v0/report/new -F 'bundle=@path/to/bundle.tar.gz' -F 'metadata={"component":"name-of-component","build_id":"0.0.2"}'
```

## Viewing the uploaded test bundle
http://localhost:8000/report/name-of-component/build-id/