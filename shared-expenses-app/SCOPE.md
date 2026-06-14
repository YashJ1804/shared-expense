# SCOPE.md

## Project Scope

Build a Shared Expenses Application capable of handling changing group memberships, expense tracking, settlements, balance calculation, and CSV import anomaly detection.

---

# Database Schema

## users

* id
* name
* email
* password

## groups

* id
* name
* description
* created_by

## group_members

* id
* group_id
* user_id
* joined_at
* left_at
* status

## expenses

* id
* group_id
* title
* description
* amount
* currency
* expense_date
* paid_by
* split_type

## expense_splits

* id
* expense_id
* user_id
* share_amount
* percentage

## settlements

* id
* group_id
* payer_id
* receiver_id
* amount
* settlement_date

## import_logs

* id
* row_number
* issue_type
* description
* action_taken
* severity

---

# CSV Anomaly Log

## Duplicate Expense

Detection:
Same title, amount and date.

Policy:
Flag for review. Do not auto-delete.

Action:
Logged as warning.

---

## Missing Currency

Detection:
Currency field empty.

Policy:
Default to INR.

Action:
Imported with warning.

---

## Negative Amount

Detection:
Amount less than zero.

Policy:
Treat as refund.

Action:
Imported and logged.

---

## Missing Payer

Detection:
Paid By field empty.

Policy:
Skip import.

Action:
Logged as error.

---

## Settlement Logged as Expense

Detection:
Keywords such as:

* paid back
* reimbursement
* settlement

Policy:
Move to settlements table.

Action:
Imported as settlement.

---

## Unknown User

Detection:
User not present in system.

Policy:
Skip row.

Action:
Logged as error.

---

## Invalid Date Format

Detection:
Unsupported date format.

Policy:
Normalize where possible.

Action:
Log warning.

---

## Membership Conflict

Detection:
Expense assigned to member before join date or after leave date.

Policy:
Exclude member from split.

Action:
Log warning.
