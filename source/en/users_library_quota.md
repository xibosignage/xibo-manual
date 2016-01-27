<!--toc=users-->
# Library Quota
[[PRODUCTNAME]] includes a library quota system so that users and groups can be assigned a quota to determine the 
maximum amount of content they are allowed to upload to the Library.

Quotas are entered on the User & User Group Add/Edit forms and are expressed in kilobytes. A value of **0** means 
unlimited.

The **largest** quota that can be resolved for the user is always the quota that is applied, excluding the unlimited
quota.

## Example

- User A has a quota of 100 MB
- Group 1 has a quota of 50 MB
- Group 2 has a quota of 120 MB

User A belongs to Group 1 and Group 2, their library quota is 120 MB. They leave Group 2 and their library quota is
reduced to 100 MB.

User A is assigned an unlimited quota (0) but their library quota is still 50 MB because they belong to Group 1.