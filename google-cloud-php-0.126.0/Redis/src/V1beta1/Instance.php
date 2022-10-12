<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/redis/v1beta1/cloud_redis.proto

namespace Google\Cloud\Redis\V1beta1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * A Google Cloud Redis instance.
 *
 * Generated from protobuf message <code>google.cloud.redis.v1beta1.Instance</code>
 */
class Instance extends \Google\Protobuf\Internal\Message
{
    /**
     * Required. Unique name of the resource in this scope including project and
     * location using the form:
     *     `projects/{project_id}/locations/{location_id}/instances/{instance_id}`
     * Note: Redis instances are managed and addressed at regional level so
     * location_id here refers to a GCP region; however, users may choose which
     * specific zone (or collection of zones for cross-zone instances) an instance
     * should be provisioned in. Refer to [location_id][google.cloud.redis.v1beta1.Instance.location_id] and
     * [alternative_location_id][google.cloud.redis.v1beta1.Instance.alternative_location_id] fields for more details.
     *
     * Generated from protobuf field <code>string name = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    private $name = '';
    /**
     * An arbitrary and optional user-provided name for the instance.
     *
     * Generated from protobuf field <code>string display_name = 2;</code>
     */
    private $display_name = '';
    /**
     * Resource labels to represent user provided metadata
     *
     * Generated from protobuf field <code>map<string, string> labels = 3;</code>
     */
    private $labels;
    /**
     * Optional. The zone where the instance will be provisioned. If not provided,
     * the service will choose a zone for the instance. For STANDARD_HA tier,
     * instances will be created across two zones for protection against zonal
     * failures. If [alternative_location_id][google.cloud.redis.v1beta1.Instance.alternative_location_id] is also provided, it must be
     * different from [location_id][google.cloud.redis.v1beta1.Instance.location_id].
     *
     * Generated from protobuf field <code>string location_id = 4 [(.google.api.field_behavior) = OPTIONAL];</code>
     */
    private $location_id = '';
    /**
     * Optional. Only applicable to STANDARD_HA tier which protects the instance
     * against zonal failures by provisioning it across two zones. If provided, it
     * must be a different zone from the one provided in [location_id][google.cloud.redis.v1beta1.Instance.location_id].
     *
     * Generated from protobuf field <code>string alternative_location_id = 5 [(.google.api.field_behavior) = OPTIONAL];</code>
     */
    private $alternative_location_id = '';
    /**
     * Optional. The version of Redis software.
     * If not provided, latest supported version will be used. Currently, the
     * supported values are:
     *  *   `REDIS_4_0` for Redis 4.0 compatibility (default)
     *  *   `REDIS_3_2` for Redis 3.2 compatibility
     *
     * Generated from protobuf field <code>string redis_version = 7 [(.google.api.field_behavior) = OPTIONAL];</code>
     */
    private $redis_version = '';
    /**
     * Optional. The CIDR range of internal addresses that are reserved for this
     * instance. If not provided, the service will choose an unused /29 block,
     * for example, 10.0.0.0/29 or 192.168.0.0/29. Ranges must be unique
     * and non-overlapping with existing subnets in an authorized network.
     *
     * Generated from protobuf field <code>string reserved_ip_range = 9 [(.google.api.field_behavior) = OPTIONAL];</code>
     */
    private $reserved_ip_range = '';
    /**
     * Output only. Hostname or IP address of the exposed Redis endpoint used by
     * clients to connect to the service.
     *
     * Generated from protobuf field <code>string host = 10 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $host = '';
    /**
     * Output only. The port number of the exposed Redis endpoint.
     *
     * Generated from protobuf field <code>int32 port = 11 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $port = 0;
    /**
     * Output only. The current zone where the Redis endpoint is placed. For Basic
     * Tier instances, this will always be the same as the [location_id][google.cloud.redis.v1beta1.Instance.location_id]
     * provided by the user at creation time. For Standard Tier instances,
     * this can be either [location_id][google.cloud.redis.v1beta1.Instance.location_id] or [alternative_location_id][google.cloud.redis.v1beta1.Instance.alternative_location_id] and can
     * change after a failover event.
     *
     * Generated from protobuf field <code>string current_location_id = 12 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $current_location_id = '';
    /**
     * Output only. The time the instance was created.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp create_time = 13 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $create_time = null;
    /**
     * Output only. The current state of this instance.
     *
     * Generated from protobuf field <code>.google.cloud.redis.v1beta1.Instance.State state = 14 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $state = 0;
    /**
     * Output only. Additional information about the current status of this
     * instance, if available.
     *
     * Generated from protobuf field <code>string status_message = 15 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $status_message = '';
    /**
     * Optional. Redis configuration parameters, according to
     * http://redis.io/topics/config. Currently, the only supported parameters
     * are:
     *  Redis 3.2 and above:
     *  *   maxmemory-policy
     *  *   notify-keyspace-events
     *  Redis 4.0 and above:
     *  *   activedefrag
     *  *   lfu-log-factor
     *  *   lfu-decay-time
     *
     * Generated from protobuf field <code>map<string, string> redis_configs = 16 [(.google.api.field_behavior) = OPTIONAL];</code>
     */
    private $redis_configs;
    /**
     * Required. The service tier of the instance.
     *
     * Generated from protobuf field <code>.google.cloud.redis.v1beta1.Instance.Tier tier = 17 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    private $tier = 0;
    /**
     * Required. Redis memory size in GiB.
     *
     * Generated from protobuf field <code>int32 memory_size_gb = 18 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    private $memory_size_gb = 0;
    /**
     * Optional. The full name of the Google Compute Engine
     * [network](/compute/docs/networks-and-firewalls#networks) to which the
     * instance is connected. If left unspecified, the `default` network
     * will be used.
     *
     * Generated from protobuf field <code>string authorized_network = 20 [(.google.api.field_behavior) = OPTIONAL];</code>
     */
    private $authorized_network = '';
    /**
     * Output only. Cloud IAM identity used by import / export operations to
     * transfer data to/from Cloud Storage. Format is
     * "serviceAccount:<service_account_email>". The value may change over time
     * for a given instance so should be checked before each import/export
     * operation.
     *
     * Generated from protobuf field <code>string persistence_iam_identity = 21 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $persistence_iam_identity = '';
    /**
     * Optional. The connect mode of Redis instance.
     * If not provided, default one will be used.
     * Current default: DIRECT_PEERING.
     *
     * Generated from protobuf field <code>.google.cloud.redis.v1beta1.Instance.ConnectMode connect_mode = 22 [(.google.api.field_behavior) = OPTIONAL];</code>
     */
    private $connect_mode = 0;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $name
     *           Required. Unique name of the resource in this scope including project and
     *           location using the form:
     *               `projects/{project_id}/locations/{location_id}/instances/{instance_id}`
     *           Note: Redis instances are managed and addressed at regional level so
     *           location_id here refers to a GCP region; however, users may choose which
     *           specific zone (or collection of zones for cross-zone instances) an instance
     *           should be provisioned in. Refer to [location_id][google.cloud.redis.v1beta1.Instance.location_id] and
     *           [alternative_location_id][google.cloud.redis.v1beta1.Instance.alternative_location_id] fields for more details.
     *     @type string $display_name
     *           An arbitrary and optional user-provided name for the instance.
     *     @type array|\Google\Protobuf\Internal\MapField $labels
     *           Resource labels to represent user provided metadata
     *     @type string $location_id
     *           Optional. The zone where the instance will be provisioned. If not provided,
     *           the service will choose a zone for the instance. For STANDARD_HA tier,
     *           instances will be created across two zones for protection against zonal
     *           failures. If [alternative_location_id][google.cloud.redis.v1beta1.Instance.alternative_location_id] is also provided, it must be
     *           different from [location_id][google.cloud.redis.v1beta1.Instance.location_id].
     *     @type string $alternative_location_id
     *           Optional. Only applicable to STANDARD_HA tier which protects the instance
     *           against zonal failures by provisioning it across two zones. If provided, it
     *           must be a different zone from the one provided in [location_id][google.cloud.redis.v1beta1.Instance.location_id].
     *     @type string $redis_version
     *           Optional. The version of Redis software.
     *           If not provided, latest supported version will be used. Currently, the
     *           supported values are:
     *            *   `REDIS_4_0` for Redis 4.0 compatibility (default)
     *            *   `REDIS_3_2` for Redis 3.2 compatibility
     *     @type string $reserved_ip_range
     *           Optional. The CIDR range of internal addresses that are reserved for this
     *           instance. If not provided, the service will choose an unused /29 block,
     *           for example, 10.0.0.0/29 or 192.168.0.0/29. Ranges must be unique
     *           and non-overlapping with existing subnets in an authorized network.
     *     @type string $host
     *           Output only. Hostname or IP address of the exposed Redis endpoint used by
     *           clients to connect to the service.
     *     @type int $port
     *           Output only. The port number of the exposed Redis endpoint.
     *     @type string $current_location_id
     *           Output only. The current zone where the Redis endpoint is placed. For Basic
     *           Tier instances, this will always be the same as the [location_id][google.cloud.redis.v1beta1.Instance.location_id]
     *           provided by the user at creation time. For Standard Tier instances,
     *           this can be either [location_id][google.cloud.redis.v1beta1.Instance.location_id] or [alternative_location_id][google.cloud.redis.v1beta1.Instance.alternative_location_id] and can
     *           change after a failover event.
     *     @type \Google\Protobuf\Timestamp $create_time
     *           Output only. The time the instance was created.
     *     @type int $state
     *           Output only. The current state of this instance.
     *     @type string $status_message
     *           Output only. Additional information about the current status of this
     *           instance, if available.
     *     @type array|\Google\Protobuf\Internal\MapField $redis_configs
     *           Optional. Redis configuration parameters, according to
     *           http://redis.io/topics/config. Currently, the only supported parameters
     *           are:
     *            Redis 3.2 and above:
     *            *   maxmemory-policy
     *            *   notify-keyspace-events
     *            Redis 4.0 and above:
     *            *   activedefrag
     *            *   lfu-log-factor
     *            *   lfu-decay-time
     *     @type int $tier
     *           Required. The service tier of the instance.
     *     @type int $memory_size_gb
     *           Required. Redis memory size in GiB.
     *     @type string $authorized_network
     *           Optional. The full name of the Google Compute Engine
     *           [network](/compute/docs/networks-and-firewalls#networks) to which the
     *           instance is connected. If left unspecified, the `default` network
     *           will be used.
     *     @type string $persistence_iam_identity
     *           Output only. Cloud IAM identity used by import / export operations to
     *           transfer data to/from Cloud Storage. Format is
     *           "serviceAccount:<service_account_email>". The value may change over time
     *           for a given instance so should be checked before each import/export
     *           operation.
     *     @type int $connect_mode
     *           Optional. The connect mode of Redis instance.
     *           If not provided, default one will be used.
     *           Current default: DIRECT_PEERING.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Redis\V1Beta1\CloudRedis::initOnce();
        parent::__construct($data);
    }

    /**
     * Required. Unique name of the resource in this scope including project and
     * location using the form:
     *     `projects/{project_id}/locations/{location_id}/instances/{instance_id}`
     * Note: Redis instances are managed and addressed at regional level so
     * location_id here refers to a GCP region; however, users may choose which
     * specific zone (or collection of zones for cross-zone instances) an instance
     * should be provisioned in. Refer to [location_id][google.cloud.redis.v1beta1.Instance.location_id] and
     * [alternative_location_id][google.cloud.redis.v1beta1.Instance.alternative_location_id] fields for more details.
     *
     * Generated from protobuf field <code>string name = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Required. Unique name of the resource in this scope including project and
     * location using the form:
     *     `projects/{project_id}/locations/{location_id}/instances/{instance_id}`
     * Note: Redis instances are managed and addressed at regional level so
     * location_id here refers to a GCP region; however, users may choose which
     * specific zone (or collection of zones for cross-zone instances) an instance
     * should be provisioned in. Refer to [location_id][google.cloud.redis.v1beta1.Instance.location_id] and
     * [alternative_location_id][google.cloud.redis.v1beta1.Instance.alternative_location_id] fields for more details.
     *
     * Generated from protobuf field <code>string name = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param string $var
     * @return $this
     */
    public function setName($var)
    {
        GPBUtil::checkString($var, True);
        $this->name = $var;

        return $this;
    }

    /**
     * An arbitrary and optional user-provided name for the instance.
     *
     * Generated from protobuf field <code>string display_name = 2;</code>
     * @return string
     */
    public function getDisplayName()
    {
        return $this->display_name;
    }

    /**
     * An arbitrary and optional user-provided name for the instance.
     *
     * Generated from protobuf field <code>string display_name = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setDisplayName($var)
    {
        GPBUtil::checkString($var, True);
        $this->display_name = $var;

        return $this;
    }

    /**
     * Resource labels to represent user provided metadata
     *
     * Generated from protobuf field <code>map<string, string> labels = 3;</code>
     * @return \Google\Protobuf\Internal\MapField
     */
    public function getLabels()
    {
        return $this->labels;
    }

    /**
     * Resource labels to represent user provided metadata
     *
     * Generated from protobuf field <code>map<string, string> labels = 3;</code>
     * @param array|\Google\Protobuf\Internal\MapField $var
     * @return $this
     */
    public function setLabels($var)
    {
        $arr = GPBUtil::checkMapField($var, \Google\Protobuf\Internal\GPBType::STRING, \Google\Protobuf\Internal\GPBType::STRING);
        $this->labels = $arr;

        return $this;
    }

    /**
     * Optional. The zone where the instance will be provisioned. If not provided,
     * the service will choose a zone for the instance. For STANDARD_HA tier,
     * instances will be created across two zones for protection against zonal
     * failures. If [alternative_location_id][google.cloud.redis.v1beta1.Instance.alternative_location_id] is also provided, it must be
     * different from [location_id][google.cloud.redis.v1beta1.Instance.location_id].
     *
     * Generated from protobuf field <code>string location_id = 4 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @return string
     */
    public function getLocationId()
    {
        return $this->location_id;
    }

    /**
     * Optional. The zone where the instance will be provisioned. If not provided,
     * the service will choose a zone for the instance. For STANDARD_HA tier,
     * instances will be created across two zones for protection against zonal
     * failures. If [alternative_location_id][google.cloud.redis.v1beta1.Instance.alternative_location_id] is also provided, it must be
     * different from [location_id][google.cloud.redis.v1beta1.Instance.location_id].
     *
     * Generated from protobuf field <code>string location_id = 4 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @param string $var
     * @return $this
     */
    public function setLocationId($var)
    {
        GPBUtil::checkString($var, True);
        $this->location_id = $var;

        return $this;
    }

    /**
     * Optional. Only applicable to STANDARD_HA tier which protects the instance
     * against zonal failures by provisioning it across two zones. If provided, it
     * must be a different zone from the one provided in [location_id][google.cloud.redis.v1beta1.Instance.location_id].
     *
     * Generated from protobuf field <code>string alternative_location_id = 5 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @return string
     */
    public function getAlternativeLocationId()
    {
        return $this->alternative_location_id;
    }

    /**
     * Optional. Only applicable to STANDARD_HA tier which protects the instance
     * against zonal failures by provisioning it across two zones. If provided, it
     * must be a different zone from the one provided in [location_id][google.cloud.redis.v1beta1.Instance.location_id].
     *
     * Generated from protobuf field <code>string alternative_location_id = 5 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @param string $var
     * @return $this
     */
    public function setAlternativeLocationId($var)
    {
        GPBUtil::checkString($var, True);
        $this->alternative_location_id = $var;

        return $this;
    }

    /**
     * Optional. The version of Redis software.
     * If not provided, latest supported version will be used. Currently, the
     * supported values are:
     *  *   `REDIS_4_0` for Redis 4.0 compatibility (default)
     *  *   `REDIS_3_2` for Redis 3.2 compatibility
     *
     * Generated from protobuf field <code>string redis_version = 7 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @return string
     */
    public function getRedisVersion()
    {
        return $this->redis_version;
    }

    /**
     * Optional. The version of Redis software.
     * If not provided, latest supported version will be used. Currently, the
     * supported values are:
     *  *   `REDIS_4_0` for Redis 4.0 compatibility (default)
     *  *   `REDIS_3_2` for Redis 3.2 compatibility
     *
     * Generated from protobuf field <code>string redis_version = 7 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @param string $var
     * @return $this
     */
    public function setRedisVersion($var)
    {
        GPBUtil::checkString($var, True);
        $this->redis_version = $var;

        return $this;
    }

    /**
     * Optional. The CIDR range of internal addresses that are reserved for this
     * instance. If not provided, the service will choose an unused /29 block,
     * for example, 10.0.0.0/29 or 192.168.0.0/29. Ranges must be unique
     * and non-overlapping with existing subnets in an authorized network.
     *
     * Generated from protobuf field <code>string reserved_ip_range = 9 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @return string
     */
    public function getReservedIpRange()
    {
        return $this->reserved_ip_range;
    }

    /**
     * Optional. The CIDR range of internal addresses that are reserved for this
     * instance. If not provided, the service will choose an unused /29 block,
     * for example, 10.0.0.0/29 or 192.168.0.0/29. Ranges must be unique
     * and non-overlapping with existing subnets in an authorized network.
     *
     * Generated from protobuf field <code>string reserved_ip_range = 9 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @param string $var
     * @return $this
     */
    public function setReservedIpRange($var)
    {
        GPBUtil::checkString($var, True);
        $this->reserved_ip_range = $var;

        return $this;
    }

    /**
     * Output only. Hostname or IP address of the exposed Redis endpoint used by
     * clients to connect to the service.
     *
     * Generated from protobuf field <code>string host = 10 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return string
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * Output only. Hostname or IP address of the exposed Redis endpoint used by
     * clients to connect to the service.
     *
     * Generated from protobuf field <code>string host = 10 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param string $var
     * @return $this
     */
    public function setHost($var)
    {
        GPBUtil::checkString($var, True);
        $this->host = $var;

        return $this;
    }

    /**
     * Output only. The port number of the exposed Redis endpoint.
     *
     * Generated from protobuf field <code>int32 port = 11 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return int
     */
    public function getPort()
    {
        return $this->port;
    }

    /**
     * Output only. The port number of the exposed Redis endpoint.
     *
     * Generated from protobuf field <code>int32 port = 11 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param int $var
     * @return $this
     */
    public function setPort($var)
    {
        GPBUtil::checkInt32($var);
        $this->port = $var;

        return $this;
    }

    /**
     * Output only. The current zone where the Redis endpoint is placed. For Basic
     * Tier instances, this will always be the same as the [location_id][google.cloud.redis.v1beta1.Instance.location_id]
     * provided by the user at creation time. For Standard Tier instances,
     * this can be either [location_id][google.cloud.redis.v1beta1.Instance.location_id] or [alternative_location_id][google.cloud.redis.v1beta1.Instance.alternative_location_id] and can
     * change after a failover event.
     *
     * Generated from protobuf field <code>string current_location_id = 12 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return string
     */
    public function getCurrentLocationId()
    {
        return $this->current_location_id;
    }

    /**
     * Output only. The current zone where the Redis endpoint is placed. For Basic
     * Tier instances, this will always be the same as the [location_id][google.cloud.redis.v1beta1.Instance.location_id]
     * provided by the user at creation time. For Standard Tier instances,
     * this can be either [location_id][google.cloud.redis.v1beta1.Instance.location_id] or [alternative_location_id][google.cloud.redis.v1beta1.Instance.alternative_location_id] and can
     * change after a failover event.
     *
     * Generated from protobuf field <code>string current_location_id = 12 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param string $var
     * @return $this
     */
    public function setCurrentLocationId($var)
    {
        GPBUtil::checkString($var, True);
        $this->current_location_id = $var;

        return $this;
    }

    /**
     * Output only. The time the instance was created.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp create_time = 13 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return \Google\Protobuf\Timestamp
     */
    public function getCreateTime()
    {
        return $this->create_time;
    }

    /**
     * Output only. The time the instance was created.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp create_time = 13 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param \Google\Protobuf\Timestamp $var
     * @return $this
     */
    public function setCreateTime($var)
    {
        GPBUtil::checkMessage($var, \Google\Protobuf\Timestamp::class);
        $this->create_time = $var;

        return $this;
    }

    /**
     * Output only. The current state of this instance.
     *
     * Generated from protobuf field <code>.google.cloud.redis.v1beta1.Instance.State state = 14 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return int
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Output only. The current state of this instance.
     *
     * Generated from protobuf field <code>.google.cloud.redis.v1beta1.Instance.State state = 14 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param int $var
     * @return $this
     */
    public function setState($var)
    {
        GPBUtil::checkEnum($var, \Google\Cloud\Redis\V1beta1\Instance_State::class);
        $this->state = $var;

        return $this;
    }

    /**
     * Output only. Additional information about the current status of this
     * instance, if available.
     *
     * Generated from protobuf field <code>string status_message = 15 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return string
     */
    public function getStatusMessage()
    {
        return $this->status_message;
    }

    /**
     * Output only. Additional information about the current status of this
     * instance, if available.
     *
     * Generated from protobuf field <code>string status_message = 15 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param string $var
     * @return $this
     */
    public function setStatusMessage($var)
    {
        GPBUtil::checkString($var, True);
        $this->status_message = $var;

        return $this;
    }

    /**
     * Optional. Redis configuration parameters, according to
     * http://redis.io/topics/config. Currently, the only supported parameters
     * are:
     *  Redis 3.2 and above:
     *  *   maxmemory-policy
     *  *   notify-keyspace-events
     *  Redis 4.0 and above:
     *  *   activedefrag
     *  *   lfu-log-factor
     *  *   lfu-decay-time
     *
     * Generated from protobuf field <code>map<string, string> redis_configs = 16 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @return \Google\Protobuf\Internal\MapField
     */
    public function getRedisConfigs()
    {
        return $this->redis_configs;
    }

    /**
     * Optional. Redis configuration parameters, according to
     * http://redis.io/topics/config. Currently, the only supported parameters
     * are:
     *  Redis 3.2 and above:
     *  *   maxmemory-policy
     *  *   notify-keyspace-events
     *  Redis 4.0 and above:
     *  *   activedefrag
     *  *   lfu-log-factor
     *  *   lfu-decay-time
     *
     * Generated from protobuf field <code>map<string, string> redis_configs = 16 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @param array|\Google\Protobuf\Internal\MapField $var
     * @return $this
     */
    public function setRedisConfigs($var)
    {
        $arr = GPBUtil::checkMapField($var, \Google\Protobuf\Internal\GPBType::STRING, \Google\Protobuf\Internal\GPBType::STRING);
        $this->redis_configs = $arr;

        return $this;
    }

    /**
     * Required. The service tier of the instance.
     *
     * Generated from protobuf field <code>.google.cloud.redis.v1beta1.Instance.Tier tier = 17 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return int
     */
    public function getTier()
    {
        return $this->tier;
    }

    /**
     * Required. The service tier of the instance.
     *
     * Generated from protobuf field <code>.google.cloud.redis.v1beta1.Instance.Tier tier = 17 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param int $var
     * @return $this
     */
    public function setTier($var)
    {
        GPBUtil::checkEnum($var, \Google\Cloud\Redis\V1beta1\Instance_Tier::class);
        $this->tier = $var;

        return $this;
    }

    /**
     * Required. Redis memory size in GiB.
     *
     * Generated from protobuf field <code>int32 memory_size_gb = 18 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return int
     */
    public function getMemorySizeGb()
    {
        return $this->memory_size_gb;
    }

    /**
     * Required. Redis memory size in GiB.
     *
     * Generated from protobuf field <code>int32 memory_size_gb = 18 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param int $var
     * @return $this
     */
    public function setMemorySizeGb($var)
    {
        GPBUtil::checkInt32($var);
        $this->memory_size_gb = $var;

        return $this;
    }

    /**
     * Optional. The full name of the Google Compute Engine
     * [network](/compute/docs/networks-and-firewalls#networks) to which the
     * instance is connected. If left unspecified, the `default` network
     * will be used.
     *
     * Generated from protobuf field <code>string authorized_network = 20 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @return string
     */
    public function getAuthorizedNetwork()
    {
        return $this->authorized_network;
    }

    /**
     * Optional. The full name of the Google Compute Engine
     * [network](/compute/docs/networks-and-firewalls#networks) to which the
     * instance is connected. If left unspecified, the `default` network
     * will be used.
     *
     * Generated from protobuf field <code>string authorized_network = 20 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @param string $var
     * @return $this
     */
    public function setAuthorizedNetwork($var)
    {
        GPBUtil::checkString($var, True);
        $this->authorized_network = $var;

        return $this;
    }

    /**
     * Output only. Cloud IAM identity used by import / export operations to
     * transfer data to/from Cloud Storage. Format is
     * "serviceAccount:<service_account_email>". The value may change over time
     * for a given instance so should be checked before each import/export
     * operation.
     *
     * Generated from protobuf field <code>string persistence_iam_identity = 21 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return string
     */
    public function getPersistenceIamIdentity()
    {
        return $this->persistence_iam_identity;
    }

    /**
     * Output only. Cloud IAM identity used by import / export operations to
     * transfer data to/from Cloud Storage. Format is
     * "serviceAccount:<service_account_email>". The value may change over time
     * for a given instance so should be checked before each import/export
     * operation.
     *
     * Generated from protobuf field <code>string persistence_iam_identity = 21 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param string $var
     * @return $this
     */
    public function setPersistenceIamIdentity($var)
    {
        GPBUtil::checkString($var, True);
        $this->persistence_iam_identity = $var;

        return $this;
    }

    /**
     * Optional. The connect mode of Redis instance.
     * If not provided, default one will be used.
     * Current default: DIRECT_PEERING.
     *
     * Generated from protobuf field <code>.google.cloud.redis.v1beta1.Instance.ConnectMode connect_mode = 22 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @return int
     */
    public function getConnectMode()
    {
        return $this->connect_mode;
    }

    /**
     * Optional. The connect mode of Redis instance.
     * If not provided, default one will be used.
     * Current default: DIRECT_PEERING.
     *
     * Generated from protobuf field <code>.google.cloud.redis.v1beta1.Instance.ConnectMode connect_mode = 22 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @param int $var
     * @return $this
     */
    public function setConnectMode($var)
    {
        GPBUtil::checkEnum($var, \Google\Cloud\Redis\V1beta1\Instance_ConnectMode::class);
        $this->connect_mode = $var;

        return $this;
    }

}

