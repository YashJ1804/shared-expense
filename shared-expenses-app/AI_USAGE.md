# AI_USAGE.md

## AI Tools Used

* ChatGPT
* GitHub Copilot

---

## Example Prompts

1. Design a Laravel database schema for a Splitwise-like application with changing memberships.

2. Generate Laravel CRUD structure for group management.

3. Create an anomaly detection workflow for CSV imports.

---

## AI Mistake #1

Suggestion:
Store balances directly in database.

Issue:
Balances could become inconsistent.

Fix:
Implemented dynamic balance calculation.

---

## AI Mistake #2

Suggestion:
Automatically delete duplicate expenses.

Issue:
Violates user requirement for approval.

Fix:
Flag duplicates instead of deleting.

---

## AI Mistake #3

Suggestion:
Ignore membership dates.

Issue:
Sam should not pay expenses before joining.

Fix:
Added joined_at and left_at support in group_members.

---

## Validation Process

Every AI-generated recommendation was reviewed and adjusted before implementation. Database schema, import policies, and balance calculations were manually verified.
