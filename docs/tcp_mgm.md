---
title: 'TCP Management Tool'
---

## Description

The TCP Management tool maps over the [TCP Management (tcp_mgm) OpenSIPS module](https://docs.opensips.org/manual/3-3/modules/tcp_mgm), which provides SQL-based, fine-grained management of the TCP connections OpenSIPS opens or accepts.

The tool provisions the *tcp_mgm* table. Each row is a path definition, matched against a connection's protocol (any, SIP TCP, SIP TLS, BIN, BIN TLS, HEP TCP, MSRP, SMPP, SIP WS or SIP WSS) and against its remote and local address and port - an address of "any" or a port of 0 matches anything, and the *Priority* column overrides the default "longest network prefix wins" ordering.

Each path carries the TCP settings applied to the connections it matches:

- *Connect Timeout* - milliseconds before an ongoing blocking TCP connect attempt is aborted (default 100 ms)
- *Connection Lifetime* - seconds with no READ or WRITE event before the connection is destroyed (default 120 s)
- *Message Read Timeout* - seconds in which a complete SIP message is expected to arrive (default 4 s)
- *Send Threshold* - microseconds above which a TCP send is logged as slow; 0 disables the check
- *Do not Connect* - never open connections towards the remote side, useful when a NAT firewall in-between only allows remote to local connections
- *TCP alias mode* - connection reuse for requests in the opposite direction: NEVER, VIA REQUESTED (only with the RFC 5923 Via ";alias") or ALWAYS
- *Parallel reading mode* - RE-BALANCE has a TCP reader hand the connection back after each packet, PARALLEL lets a proto module re-balance it before a fully read packet is processed; the default NONE locks the connection into one reader
- *TCP Keepalive* - keepalives at Operating System level, together with their count, idle time and interval
- *Attributes* - a URI params like string carrying connection flags used by specific OpenSIPS modules

The tool is built on the [TViewer](tviewer.md) framework, so it provides the usual list, search, add, edit and delete actions over the table. Provisioning is done in the DB, so in order to push the changes into OpenSIPS use the *Reload on Server* button - this triggers the *tcp_reload* command via the Management Interface. Reloading does not disrupt ongoing traffic; the new paths apply to connections established after it.

## Configuration

Tool specific settings are configurable via the setting panel - see gear-icon in the tool header.

All settings are explained via ToolTip and have format validation.
