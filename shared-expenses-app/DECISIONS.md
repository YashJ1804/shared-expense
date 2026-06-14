# DECISIONS.md

## Decision 1: Dynamic Balance Calculation

Problem:
Whether balances should be stored or calculated.

Options:

1. Store balances
2. Calculate dynamically

Chosen:
Calculate dynamically

Reason:
Avoid inconsistency and duplicate data.

---

## Decision 2: Duplicate Handling

Problem:
Duplicate expense records.

Options:

1. Delete automatically
2. Keep both
3. Flag for review

Chosen:
Flag for review

Reason:
Meera requested approval before deletion.

---

## Decision 3: Settlement Storage

Problem:
Store settlements inside expenses or separate table.

Options:

1. Expense table
2. Settlement table

Chosen:
Settlement table

Reason:
Cleaner accounting and easier reporting.

---

## Decision 4: Membership Tracking

Problem:
Changing group members.

Options:

1. Store members directly in groups
2. Use group_members table

Chosen:
group_members

Reason:
Supports join and leave dates.

---

## Decision 5: Refund Handling

Problem:
Negative amounts.

Options:

1. Reject
2. Treat as refund

Chosen:
Treat as refund

Reason:
Valid financial event.
