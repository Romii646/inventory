# Glossary: Main Inventory System

---

This glossary defines common terms, acronyms, and concepts used throughout the Main Inventory System documentation and application.

---

## A

**Accessory**  
A peripheral component or add-on that is not a core part of a PC (e.g., adapters, dongles, cables).

**Admin**  
A user with elevated privileges (see also: DBA, FullTime, SoftwareDev).

---

## C

**Component**  
A generic term for an individual piece of hardware (e.g., GPU, RAM, keyboard).

**Composite PC Setup (PC Setup)**  
A record in the system representing a complete workstation or PC, linked to its constituent components.

**Condition**  
A field that indicates the operational state of an asset (e.g., GOOD, BROKEN).

---

## D

**DBA (Database Administrator)**  
A user role with the highest level of access, able to manage employees, assets, and system settings.

**Disposed**  
Status assigned to assets that are no longer in use and have been removed from active inventory.

---

## E

**Employee**  
A user account that represents a staff member, developer, or administrator with access to the system.

---

## F

**Foreign Key (FK)**  
A field in a database table that references the primary key of another table, enforcing referential integrity.

---

## I

**IN_USE**  
A status indicating an asset is actively assigned, installed, or being used.

**Inventory**  
The collection of all assets managed by the system.

---

## L

**Location**  
A field that records the physical place where an asset is kept (e.g., “Table 2 - 1”, “Storage room 212”).

---

## M

**MiniPC**  
Small form-factor computers tracked in the system.

---

## P

**PCcondition**  
A descriptive field in `pcsetups` that notes the state or notes about a composite PC (e.g., “Windows 10. Working.”).

**Primary Key (PK)**  
A unique identifier for each record in a database table.

---

## R

**RAM Stick**  
A memory module (DDR3, DDR4, DDR5) tracked as an asset.

---

## S

**Status**  
A field that indicates the current lifecycle stage or assignment of an asset (e.g., IN_USE, STORAGE, DISPOSED).

**Storage Component**  
A hard drive, SSD, or other storage device tracked in the system.

**Storage Slot**  
A physical or logical location (rack, bay, shelf) where storage components are kept.

**STORAGE**  
Status indicating an asset is held in storage and is not currently in use.

---

## T

**Tracking**  
The process of recording and updating the status, condition, and location of assets.

---

## U

**User**  
Any employee with an account in the system.

---

## V

**View**  
A virtual table in the database that provides a specific report or summary (e.g., `component_totals`, `disposed_parts`).

---

## Other Terms

**CSV Export**  
A feature allowing users to download data or reports in Comma-Separated Values format.

**Referential Integrity**  
A database concept ensuring relationships between tables remain consistent (e.g., no orphaned PC setups).

---

If you encounter an unfamiliar term not listed here, please suggest it via the [CONTRIBUTING.md](CONTRIBUTING.md) process.