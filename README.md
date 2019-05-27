# Currencies Rates Retriever

Retrieve currencies rates from official sources.

EUR: https://www.ecb.europa.eu/stats/policy_and_exchange_rates/euro_reference_exchange_rates/html/usd.xml
RUB: https://www.cbr.ru/currency_base/dynamics/?UniDbQuery.Posted=True&UniDbQuery.mode=1&UniDbQuery.date_req1=&UniDbQuery.date_req2=&UniDbQuery.VAL_NM_RQ=R01235&UniDbQuery.FromDate=31.12.1998&UniDbQuery.ToDate=24.08.2020
GBP: https://www.bankofengland.co.uk/boeapps/database/fromshowcolumns.asp?Travel=NIxAZxSUx&FromSeries=1&ToSeries=50&DAT=RNG&FD=1&FM=Jan&FY=2017&TD=31&TM=Dec&TY=2025&FNY=Y&CSVF=TT&html.x=66&html.y=26&SeriesCodes=XUDLUSS&UsingCodes=Y&Filter=N&title=XUDLUSS&VPD=Y

# Install

1 . Clone repository

```
git clone https://github.com/antonshell/currencies-rates-retriever.git
```

2 . Install dependencies

```
cd currencies-rates-retriever
composer install
```

# Usage:

1 . Update currencies rates

```
php bin/console currencies:update-all-rates
```

2 . Currencies rates will be in ```currencies_data``` folder in json files.

# Testing

